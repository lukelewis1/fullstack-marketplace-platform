<?php
//<!-- Authored by Oliver Wuttke, FAN WUTT0019, Edited by (Oliver Wuttke, FAN WUTT0019) -->

    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }

    $currentPage = basename($_SERVER['PHP_SELF']);

    require_once __DIR__ . '/../inc/dbconn.inc.php';
    require_once __DIR__ . '/../inc/functions.php';

    $uid = get_uid($_SESSION['username']);

//    Grabs all types of bookings and status of those bookings for the logged in user
    $sql = "SELECT * FROM Bookings WHERE booker_id = ? OR service_provider_id = ?;";
    $statement = $conn->prepare($sql);
    $statement->bind_param('ii', $uid, $uid);
    $statement->execute();
    $result = $statement->get_result();

    $results = [];

    while ($row = $result->fetch_assoc()) {
        $results[] = $row;
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

<script>
    const bookings = <?php echo json_encode($results); ?>;
    const uid = <?php echo json_encode($uid); ?>;
</script>


<h1>Bookings Calendar</h1>
<!--Legend for the colours in calendar js handles the creation-->
<div id="calendar-legend">
    <div class="legend-item">
        <span class="legend-color booker-pending"></span> Booker – Pending
    </div>
    <div class="legend-item">
        <span class="legend-color booker-confirmed"></span> Booker – Confirmed
    </div>
    <div class="legend-item">
        <span class="legend-color provider-pending"></span> Provider – Pending
    </div>
    <div class="legend-item">
        <span class="legend-color provider-confirmed"></span> Provider – Confirmed
    </div>
</div>

<div id="calendar"></div>

<script src="calendar_handler/calendar_script.js"></script>
</body>
</html>
