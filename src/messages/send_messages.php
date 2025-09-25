<?php
session_start();
require_once '../inc/dbconn.inc.php';

$user = $_SESSION['username'] ?? null;
if (!$user) { http_response_code(401); exit; }

$text = trim($_POST['text'] ?? '');
$conv = intval($_POST['conversation_id'] ?? 0);
if (!$text || !$conv) { http_response_code(400); exit; }

// --- Get current user ---
$stmt = $conn->prepare("SELECT id FROM Users WHERE user_name=?");
$stmt->bind_param('s',$user);
$stmt->execute();
$stmt->bind_result($uid);
$stmt->fetch();
$stmt->close();

// --- Insert the message ---
$stmt = $conn->prepare("
    INSERT INTO ChatMessages (conversation_id, sender_id, message_text, sent_at)
    VALUES (?, ?, ?, NOW())
");
$stmt->bind_param('iis', $conv, $uid, $text);
$stmt->execute();
$stmt->close();

// --- Figure out who is who ---
$stmt = $conn->prepare("SELECT sender_id, receiver_id FROM Messages WHERE conversation_id=?");
$stmt->bind_param('i',$conv);
$stmt->execute();
$stmt->bind_result($s,$r);
$stmt->fetch();
$stmt->close();

if ($uid == $s) {
    // logged user is sender → mark unread for receiver
    $stmt = $conn->prepare("UPDATE Messages SET unseen=1 WHERE conversation_id=?");
    $stmt->bind_param('i',$conv);
} else {
    // logged user is receiver → mark unread for sender
    $stmt = $conn->prepare("UPDATE Messages SET unseen_2=1 WHERE conversation_id=?");
    $stmt->bind_param('i',$conv);
}
$stmt->execute();
$stmt->close();

echo json_encode(["ok"=>true]);
