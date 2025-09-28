<?php

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

$currentPage = basename($_SERVER['PHP_SELF']);

require_once __DIR__ . '/../../inc/dbconn.inc.php';
require_once __DIR__ . '/../../inc/functions.php';

$uid = get_uid($_SESSION['username']);
$fid = $_POST['friend_id'];

$sql = "UPDATE Friendships SET status = 'accepted' WHERE user_id = ? AND friend_id = ?;";
$statement = $conn->prepare($sql);
$statement->bind_param('ii', $fid, $uid);
$statement->execute();
$statement->close();

echo json_encode(['success' => true]);