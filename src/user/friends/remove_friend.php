<?php

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

$currentPage = basename($_SERVER['PHP_SELF']);

require_once '../../inc/dbconn.inc.php';
require_once '../../inc/functions.php';

$uid = get_uid($_SESSION['username']);
$fid = $_POST['friend_id'];

$sql = 'DELETE FROM Friendships WHERE (user_id = ? AND friend_id = ?) OR (user_id = ? AND friend_id = ?)';
$stmt = $conn->prepare($sql);
$stmt->bind_param('iiii', $uid, $fid, $fid, $uid);
$stmt->execute();
$stmt->close();

header('Content-Type: application/json');
echo json_encode(['success' => true]);