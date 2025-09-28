<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

require_once '../../inc/dbconn.inc.php';
require_once '../../inc/functions.php';

$currentUserId = get_uid($_SESSION['username']);
$requesterId   = $_POST['friend_id'] ?? null;  // id of the person who sent the request


$sql = "DELETE FROM Friendships WHERE user_id = ? AND friend_id = ? AND status = 'pending';";
$stmt = $conn->prepare($sql);
$stmt->bind_param('ii', $requesterId, $currentUserId);
$stmt->execute();
$stmt->close();

header('Content-Type: application/json');
echo json_encode(['success' => true]);
