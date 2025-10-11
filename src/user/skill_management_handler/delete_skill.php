<!-- Authored by Oliver Wuttke, FAN WUTT0019, Edited by (Oliver Wuttke, FAN WUTT0019) -->

<?php

    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }

    $currentPage = basename($_SERVER['PHP_SELF']);

    require_once __DIR__ . '/../../inc/dbconn.inc.php';
    require_once __DIR__ . '/../../inc/functions.php';

    $lid = $_POST['listing_id'];
    $uid = get_uid($_SESSION['username']);

    $sql = "SELECT * FROM Bookings WHERE service_id = ?;";
    $statement = $conn->prepare($sql);
    $statement->bind_param('i', $lid);
    $statement->execute();
    $result = $statement->get_result();

    if ($result->num_rows > 0) {
        header('Content-Type: application/json');
        echo json_encode(false);
        $statement->close();
    } else {
        $sql = "DELETE FROM Listings WHERE listing_id = ? AND user_id = ?;";
        $statement = $conn->prepare($sql);
        $statement->bind_param('ii', $lid, $uid);
        $statement->execute();
        $statement->close();

        header('Content-Type: application/json');
        echo json_encode(true);
    }