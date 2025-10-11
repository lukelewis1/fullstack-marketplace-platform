<?php
//<!-- Authored by Oliver Wuttke, FAN WUTT0019, Edited by (Oliver Wuttke, FAN WUTT0019) -->
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }

    $currentPage = basename($_SERVER['PHP_SELF']);

    require_once __DIR__ . '/../../inc/dbconn.inc.php';
    require_once __DIR__ . '/../../inc/functions.php';

    $booker_id = get_uid($_SESSION['username']);
    $provider_id = $_POST['pid'];
    $service_id = $_POST['sid'];
    $reason = $_POST['reason'];
    $skill_name = $_POST['title'];
    $credits = $_POST['cost'];


    // Delete the booking from the booking table
    $sql = "DELETE FROM Bookings WHERE booker_id = ? AND service_provider_id = ? AND service_id = ?;";
    $statement = $conn->prepare($sql);
    $statement->bind_param('iii', $booker_id, $provider_id, $service_id);

    if (!$statement->execute()) {
        echo "Cancellation failed: (" . $statement->errno . ") " . $statement->error;
        $statement->close();
        exit;
    }
    $statement->close();


    // Send a message to the provider for why the cancellation happened, first check for if a conversation already exists
    $sql = "SELECT conversation_id 
            FROM Messages 
            WHERE (sender_id = ? AND receiver_id = ?) 
               OR (sender_id = ? AND receiver_id = ?) 
            LIMIT 1";
    $statement = $conn->prepare($sql);
    $statement->bind_param('iiii', $booker_id, $provider_id, $provider_id, $booker_id);
    $statement->execute();
    $statement->bind_result($conversation_id);
    $statement->fetch();
    $statement->close();

    // if a conversation doesn't already exist create one
    if (!$conversation_id) {
        $sql = "INSERT INTO Messages (sender_id, receiver_id, start_date, end_date, unseen, unseen_2)
                VALUES (?, ?, NOW(), NOW(), 0, 0)";
        $statement = $conn->prepare($sql);
        $statement->bind_param('ii', $booker_id, $provider_id);
        if (!$statement->execute()) {
            echo "Failed to create conversation: (" . $statement->errno . ") " . $statement->error;
            $statement->close();
            exit;
        }
        $conversation_id = $statement->insert_id;
        $statement->close();
    }

    // Sends a message to the service provider letting them know the booking is canceled and why
    $msg = $skill_name . "Booking cancelled: " . $reason;
    $sql = "INSERT INTO ChatMessages (conversation_id, sender_id, message_text, sent_at)
            VALUES (?, ?, ?, NOW())";
    $statement = $conn->prepare($sql);
    $statement->bind_param('iis', $conversation_id, $booker_id, $msg);
    if (!$statement->execute()) {
        echo "Failed to send message: (" . $statement->errno . ") " . $statement->error;
    }
    $statement->close();

    // Make it work with live message notifications
    $sql = "UPDATE Messages SET unseen = 1 WHERE receiver_id = ?;";
    $statement = $conn->prepare($sql);
    $statement->bind_param('i', $provider_id);
    $statement->execute();
    $statement->close();

    // Refund the FUSS credits
    $sql = "UPDATE Users SET fuss_credit = fuss_credit + ? WHERE id = ?;";
    $statement = $conn->prepare($sql);
    $statement->bind_param('di', $credits, $booker_id);
    $statement->execute();
    $statement->close();

    // Lets js know everything went well
    header('Content-Type: application/json');
    echo json_encode(true);

