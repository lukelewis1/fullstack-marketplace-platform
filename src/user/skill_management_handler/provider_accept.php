<?php
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }

    $currentPage = basename($_SERVER['PHP_SELF']);

    require_once __DIR__ . '/../../inc/dbconn.inc.php';
    require_once __DIR__ . '/../../inc/functions.php';

    $booking_id = $_POST['bid'];

    $sql = "UPDATE Bookings SET provider_confirm = TRUE WHERE booking_id = ?;";
    $statement = $conn->prepare($sql);
    $statement->bind_param('i', $booking_id);
    $statement->execute();
    $statement->close();

    header('Content-Type: application/json');
    echo json_encode(true);
