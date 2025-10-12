<?php
//<!-- Authored by Oliver Wuttke, FAN WUTT0019, Edited by (Oliver Wuttke, FAN WUTT0019) -->

    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }

    $currentPage = basename($_SERVER['PHP_SELF']);

    require_once __DIR__ . '/../inc/dbconn.inc.php';
    require_once __DIR__ . '/../inc/functions.php';

    $uid = $_SESSION['username'];

    // Grabs all booking information where both the service provider and booker have confirmed service completion
    $sql = "SELECT booking_id, booker_id, service_provider_id, service_id, provider_confirm, booker_confirm FROM Bookings WHERE provider_confirm = TRUE AND booker_confirm = TRUE;";
    $statement = $conn->prepare($sql);
    $statement->execute();
    $result = $statement->get_result();

    while ($row = $result->fetch_assoc()) {
        $booking_id = $row['booking_id'];
        $credits = get_creds($row['service_id']);
        $lid = $row['service_id'];
        $pid = $row['service_provider_id'];
        $bid = $row['booker_id'];
        $title = get_listing_name($lid);

        // Deletes the booking
        $sql = "DELETE FROM Bookings WHERE booking_id = ?;";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('i', $booking_id);
        $stmt->execute();
        $stmt->close();

        // Adds 1 to the successful transactions variable tied to the given listing
        $sql = "UPDATE Listings SET successful_exchanges = successful_exchanges + 1 WHERE listing_id = ?;";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('i', $lid);
        $stmt->execute();
        $stmt->close();

        // Awards the provider with the agreed amount of fuss credits
        $sql = "UPDATE Users SET fuss_credit = fuss_credit + ? WHERE id = ?;";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('di', $credits, $pid);
        $stmt->execute();
        $stmt->close();

        // Inserts the transaction into the transaction history table
        $topic = get_topic($lid);
        $sql = "INSERT INTO TransactionHistory (service_id, service_title, service_topic, provider_id, booker_id, price)
                VALUES (?, ?, ?, ?, ?, ?);";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('issiid', $lid, $title, $topic, $pid, $bid, $credits);
        $stmt->execute();
        $stmt->close();

        // update for the service provider
        $sql = "INSERT INTO Notifications (user_id, type) VALUES (?, 'completed_service');";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('i', $pid);
        $stmt->execute();
        $stmt->close();

        // update for the booker
        $sql = "INSERT INTO Notifications (user_id, type) VALUES (?, 'completed_service');";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('i', $bid);
        $stmt->execute();
        $stmt->close();
    }

    $statement->close();