<?php

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

$currentPage = basename($_SERVER['PHP_SELF']);

$uid = get_uid($_SESSION['username']);

$sql = "SELECT friendship_id FROM Friendships WHERE friend_id = ? AND status = 'pending';";
$statement = $conn->prepare($sql);
$statement->bind_param('i', $uid);
$statement->execute();
$result = $statement->get_result();

if ($result->num_rows > 0) {
    echo json_encode(['request' => true]);
} else {
    echo json_encode(['request' => false]);
}

