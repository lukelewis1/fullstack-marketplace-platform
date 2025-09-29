<?php

    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }

    $currentPage = basename($_SERVER['PHP_SELF']);

    require_once __DIR__ . '/../../inc/dbconn.inc.php';
    require_once __DIR__ . '/../../inc/functions.php';

    $lid = $_POST['listing_id'];
    $uid = get_uid($_SESSION['username']);

    $sql = "DELETE FROM Listings WHERE listing_id = ? AND user_id = ?;";
    $statement = $conn->prepare($sql);
    $statement->bind_param('ii', $lid, $uid);
    $statement->execute();
    $statement->close();

    header('Content-Type: application/json');
    echo json_encode(true);