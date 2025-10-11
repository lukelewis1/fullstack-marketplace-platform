<!-- Authored by Oliver Wuttke, FAN WUTT0019, Edited by (Oliver Wuttke, FAN WUTT0019) -->

<?php

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

$currentPage = basename($_SERVER['PHP_SELF']);

require_once '../../inc/dbconn.inc.php';
require_once '../../inc/functions.php';

$uid = get_uid($_SESSION['username']);
$fid = $_POST['friend_id'];
$status = 'pending';

// Insets a pending friend status between current user and another
$sql = 'INSERT INTO Friendships(user_id, friend_id, requester_id, status) 
        VALUES (?, ?, ?, ?);';

$statement = $conn->prepare($sql);
$statement->bind_param('iiis', $uid, $fid, $uid, $status);
$statement->execute();
$statement->close();

//Returns a bool so the JS handler can proceed with updating the information correctly on the client side
echo json_encode(['success' => true]);