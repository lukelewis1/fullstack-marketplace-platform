<?php

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

$currentPage = basename($_SERVER['PHP_SELF']);

require_once '../../inc/dbconn.inc.php';
require_once '../../inc/functions.php';

$uid = get_uid($_SESSION['username']);
$fid = $_POST['friend_id'];

$sql = 'DELETE FROM Friendships WHERE user_id = ? AND friend_id = ?;';
$statement = $conn->prepare($sql);
$statement->bind_param('ii', $uid, $fid);
$statement->execute();
$statement->close();

header('Content-Type: application/json');
echo json_encode(['success' => true]);