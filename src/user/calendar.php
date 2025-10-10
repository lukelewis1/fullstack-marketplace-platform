<?php

    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }

    $currentPage = basename($_SERVER['PHP_SELF']);

    require_once __DIR__ . '/../inc/dbconn.inc.php';
    require_once __DIR__ . '/../inc/functions.php';

    $uid = get_uid($_SESSION['username']);

    $sql = "SELECT * FROM Bookings WHERE booker_id = ? OR service_provider_id = ?;";
    $statement = $conn->prepare($sql);
    $statement->bind_param('ii', $uid, $uid);
    $statement->execute();
    $result = $statement->get_result();

    $results = [];

    while ($row = $result->fetch_assoc()) {
        $result[] = $row;
    }
    $statement->close();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>FUSS</title>
    <link rel="stylesheet" href="../styles/style.css" />
    <link rel="stylesheet" href="calendar_handler/calendar_style.css" />
</head>
<body>
<?php
include_header($_SESSION['username'] ?? null);
?>

<h1>Bookings Calendar</h1>
</body>
</html>
