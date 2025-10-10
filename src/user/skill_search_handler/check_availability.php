<?php
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }

    $currentPage = basename($_SERVER['PHP_SELF']);

    require_once __DIR__ . '/../../inc/dbconn.inc.php';
    require_once __DIR__ . '/../../inc/functions.php';

    $time_slot = $_POST['slot_id'];
    $uid = get_uid($_SESSION['username']);

    $parts = explode('|', $time_slot);
    $start = trim($parts[0]);
    $end = trim($parts[1]);

    $sql = "SELECT * FROM Bookings WHERE (booker_id = ? OR service_provider_id = ?) AND start = ? AND end = ?;";
    $statement = $conn->prepare($sql);
    $statement->bind_param('iiss', $uid, $uid, $start, $end);
    $statement->execute();
    $result = $statement->get_result();

    if ($row = $result->fetch_assoc()) {
        // User is either the booker or the provider for this slot
        if ($row['booker_id'] == $uid) {
            echo json_encode(['available' => false, 'reason' => 'You already booked this slot.']);
        } elseif ($row['service_provider_id'] == $uid) {
            echo json_encode(['available' => false, 'reason' => 'You are the provider for this slot.']);
        } else {
            echo json_encode(['available' => false, 'reason' => 'This slot is unavailable.']);
        }
    } else {
        // No conflicts found
        echo json_encode(['available' => true]);
    }

    $statement->close();
