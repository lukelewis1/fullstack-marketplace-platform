<?php

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

$currentPage = basename($_SERVER['PHP_SELF']);

require_once '../../inc/dbconn.inc.php';
require_once '../../inc/functions.php';

$uid = get_uid($_SESSION['username']);
$fid = $_POST['friend_id'];


//Deletes the friendship both ways depending on whether or not the user is the friend or user in the relationship,
// this had to be done this way because of how the DB was setup.
$sql = 'DELETE FROM Friendships WHERE (user_id = ? AND friend_id = ?) OR (user_id = ? AND friend_id = ?)';
$stmt = $conn->prepare($sql);
$stmt->bind_param('iiii', $uid, $fid, $fid, $uid);
$stmt->execute();
$stmt->close();

//Returns a bool so the JS handler can proceed with updating the information correctly on the client side
header('Content-Type: application/json');
echo json_encode(['success' => true]);