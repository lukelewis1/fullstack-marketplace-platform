<!-- Authored by Oliver Wuttke, FAN WUTT0019, Edited by (Oliver Wuttke, FAN WUTT0019) -->

<?php

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

$currentPage = basename($_SERVER['PHP_SELF']);

require_once __DIR__ . '/../../inc/dbconn.inc.php';
require_once __DIR__ . '/../../inc/functions.php';

$uid = get_uid($_SESSION['username']);
$fid = $_POST['friend_id'];

// Sets the friendship status to accepted for a given friendship
$sql = "UPDATE Friendships SET status = 'accepted' WHERE user_id = ? AND friend_id = ?;";
$statement = $conn->prepare($sql);
$statement->bind_param('ii', $fid, $uid);
$statement->execute();
$statement->close();

//Returns a bool so the JS handler can proceed with updating the information correctly on the client side
echo json_encode(['success' => true]);