<!-- Authored by Oliver Wuttke, FAN WUTT0019, Edited by (Oliver Wuttke, FAN WUTT0019) -->

<?php

    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }

    $currentPage = basename($_SERVER['PHP_SELF']);

    require_once __DIR__ . '/../inc/dbconn.inc.php';
    require_once __DIR__ . '/../inc/functions.php';

    $uid = get_uid($_SESSION['username']);

    $sql = "SELECT type, time, seen FROM Notifications WHERE user_id = ? ORDER BY seen ASC, time DESC;";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('i', $uid);
    $stmt->execute();
    $result = $stmt->get_result();

    $notifications = [];

    while ($row = $result->fetch_assoc()) {
        $notifications[] = $row;
    }
    $stmt->close();

    foreach ($notifications as &$item) {
        switch ($item['type']) {
            case 'service_request':
                $item['msg'] = "A user has requested a service you provide.";
                $item['loc'] = '/user/my_skills.php';
                break;
            case 'accepted_request':
                $item['msg'] = "A service provider has accepted one of your requests.";
                $item['loc'] = '/user/skill_bookings.php';
                break;
            case 'completed_service_confirm':
                $item['msg'] = "A service provider has confirmed service completion, if this is true confirm on your end as well.";
                $item['loc'] = '/user/skill_bookings.php';
                break;
            case 'completed_service':
                $item['msg'] = "A service has been completed and confirmed by both you and the other party.";
                $item['loc'] = '#';
                break;
            case 'review':
                $item['msg'] = "You've received a new review.";
                $item['loc'] = '#';
                break;
        }
    }
    unset($item);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>FUSS</title>
    <link rel="stylesheet" href="/styles/style.css" />
    <link rel="stylesheet" href="notification_style.css" />
</head>
<body>
<?php
    include_header($_SESSION['username'] ?? null);
?>

<h1>Notifications</h1>

<div class="notifications">
    <ul class="my-notifications">
        <?php
            if (count($notifications) === 0) {
                echo '<h3 class="skill-title">You Have No Notifications</h3>';
            }
            else foreach ($notifications as $item):
        ?>
        <div>
            <li class="notification-res">
                <h5><a href="<?= htmlspecialchars($item['loc']) ?>"><?= htmlspecialchars($item['msg']) ?></a></h5>
                <p><?= htmlspecialchars($item['time']) ?></p>
            </li>
        </div>
        <?php endforeach; ?>
    </ul>
</div>

</body>
</html>
