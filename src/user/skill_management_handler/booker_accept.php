<?php
//<!-- Authored by Oliver Wuttke, FAN WUTT0019, Edited by (Oliver Wuttke, FAN WUTT0019) -->
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }

    $currentPage = basename($_SERVER['PHP_SELF']);

    require_once __DIR__ . '/../../inc/dbconn.inc.php';
    require_once __DIR__ . '/../../inc/functions.php';

    $bid = $_POST['bid'];
    $type = $_POST['type'];
    $sentiment = $_POST['sentiment'];
    $review = $_POST['review'];
    $sid = $_POST['sid'];
    $uid = get_uid_listing($sid);

    $sql = "UPDATE Bookings SET booker_confirm = TRUE WHERE booking_id = ?;";
    $statement = $conn->prepare($sql);
    $statement->bind_param('i', $bid);
    $statement->execute();
    $statement->close();

    if (!empty($review)) {
        $sql = "INSERT INTO Reviews (service_id, type, review) VALUES (?, ?, ?);";
        $statement = $conn->prepare($sql);
        $statement->bind_param('iss', $sid, $type, $review);
        $statement->execute();
        $statement->close();

        $sql = "INSERT INTO Notifications (user_id, type) VALUES (?, 'review');";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('i', $uid);
        $stmt->execute();
        $stmt->close();
    }

    if ($sentiment === 'like') {
        $sql = "UPDATE Listings SET likes = likes + 1 WHERE listing_id = ?;";
        $statement = $conn->prepare($sql);
        $statement->bind_param('i', $sid);
        $statement->execute();
        $statement->close();
    } elseif ($sentiment === 'dislike') {
        $sql = "UPDATE Listings SET dislikes = dislikes + 1 WHERE listing_id = ?;";
        $statement = $conn->prepare($sql);
        $statement->bind_param('i', $sid);
        $statement->execute();
        $statement->close();
    }

    header('Content-Type: application/json');
    echo json_encode(true);
