<!-- Authored by Oliver Wuttke, FAN WUTT0019, Edited by (Oliver Wuttke, FAN WUTT0019) -->

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

    $booker_id = get_booker($booking_id);

    $sql = "INSERT INTO Notifications (user_id, type) VALUES (?, 'completed_service_confirm');";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('i', $booker_id);
    $stmt->execute();
    $stmt->close();

    header('Content-Type: application/json');
    echo json_encode(true);
