<?php
if (session_status() === PHP_SESSION_NONE) { session_start(); }
require_once $_SERVER['DOCUMENT_ROOT'].'/inc/dbconn.inc.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/inc/functions.php';

function bad($code,$msg){ http_response_code($code); exit($msg); }

if ($_SERVER['REQUEST_METHOD'] !== 'POST') bad(405,'Method not allowed');
if (empty($_SESSION['username'])) bad(401,'Login required');

$client_name = $_SESSION['username'];
$listing_id  = isset($_POST['listing_id']) && ctype_digit($_POST['listing_id']) ? (int)$_POST['listing_id'] : 0;
$slotRaw     = $_POST['slot'] ?? '';
$csrf        = $_POST['csrf'] ?? '';

if (!$listing_id || !$slotRaw) bad(400,'Missing fields');
if (!hash_equals($_SESSION['csrf'] ?? '', $csrf)) bad(400,'Invalid CSRF');

// Parse "start|end" from the select
$parts = explode('|', $slotRaw, 2);
if (count($parts) !== 2) bad(400,'Invalid slot format');
list($startSql, $endSql) = $parts;

// Load listing (provider + price)
$st = $conn->prepare("SELECT user_id AS provider_id, price FROM Listings WHERE listing_id = ? LIMIT 1");
$st->bind_param('i', $listing_id);
$st->execute(); $L = $st->get_result()->fetch_assoc(); $st->close();
if (!$L) bad(404,'Listing not found');

// Prevent self-book
$client_id = get_uid($client_name);
if ((int)$L['provider_id'] === (int)$client_id) bad(400,'Cannot book your own service');

// Ensure slot is still free (overlap check)
$st = $conn->prepare("
  SELECT 1 FROM Bookings
  WHERE service_id = ? AND status IN ('pending','confirmed')
    AND NOT (end <= ? OR start >= ?)
  LIMIT 1
");
$st->bind_param('iss', $listing_id, $startSql, $endSql);
$st->execute(); $busy = $st->get_result()->fetch_column(); $st->close();
if ($busy) bad(409,'Slot already taken');

// Atomic credit check + deduction + booking
$conn->begin_transaction();
try {
  // lock user row
  $st = $conn->prepare("SELECT id, fuss_credit FROM Users WHERE user_name = ? FOR UPDATE");
  $st->bind_param('s', $client_name);
  $st->execute(); $U = $st->get_result()->fetch_assoc(); $st->close();
  if (!$U) throw new Exception('User not found');

  $price = (float)$L['price'];
  if ((float)$U['fuss_credit'] < $price) {
    throw new Exception('INSUFFICIENT_CREDITS');
  }

  // deduct credits
  $st = $conn->prepare("UPDATE Users SET fuss_credit = fuss_credit - ? WHERE id = ?");
  $st->bind_param('di', $price, $U['id']);
  $st->execute(); $st->close();

  // create booking
  $st = $conn->prepare("
    INSERT INTO Bookings (booker_id, service_provider_id, start, end, service_id, status)
    VALUES (?, ?, ?, ?, ?, 'pending')
  ");
  $st->bind_param('iissi', $U['id'], $L['provider_id'], $startSql, $endSql, $listing_id);
  $st->execute(); $booking_id = $st->insert_id; $st->close();

  $conn->commit();

  $sql = "INSERT INTO Notifications (user_id, type) VALUES (?, 'service_request');";
  $stmt = $conn->prepare($sql);
  $stmt->bind_param('i', $L['provider_id']);
  $stmt->execute();
  $stmt->close();

  // Redirect to booking confirmation page
  header("Location: /user/skill_search_handler/booking_success.php?booking_id=".$booking_id);
  exit;

} catch (Exception $e) {
  $conn->rollback();
  if ($e->getMessage() === 'INSUFFICIENT_CREDITS') {
    bad(402, 'Insufficient credits.');
  }
  bad(409, 'Could not complete booking.');
}
