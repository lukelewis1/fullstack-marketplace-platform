<!-- Authored by Oliver Wuttke, FAN WUTT0019, Edited by (Oliver Wuttke, FAN WUTT0019) -->

<?php

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

$currentPage = basename($_SERVER['PHP_SELF']);

require_once __DIR__ . '/../../inc/dbconn.inc.php';
require_once __DIR__ . '/../../inc/functions.php';

$uid = get_uid($_SESSION['username']);

// Gets all the pending friendships that the user has initiated
$sql = "SELECT friend_id FROM Friendships WHERE requester_id = ? AND status = 'pending'";
$statement = $conn->prepare($sql);
$statement->bind_param('i', $uid);
$statement->execute();
$result = $statement->get_result();

$fr_sent = [];
while ($row = $result->fetch_assoc()) {
    $fr_sent[$row['friend_id']] = get_username($row['friend_id']);
}
$statement->close();

// Gets all the friendships that another user has tried to initiate with the user
$sql = "SELECT user_id FROM Friendships WHERE friend_id = ? AND requester_id != ? AND status = 'pending'";
$statement = $conn->prepare($sql);
$statement->bind_param('ii', $uid, $uid);
$statement->execute();
$result = $statement->get_result();

$fr_received = [];
while ($row = $result->fetch_assoc()) {
    $fr_received[$row['user_id']] = get_username($row['user_id']);
}
$statement->close();



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>FUSS</title>
    <link rel="stylesheet" href="/styles/style.css" />
    <link rel="stylesheet" href="friend_style.css" />
</head>
<body>
<?php
include_header($_SESSION['username'] ?? null);
?>

<h1>Friend Requests Sent</h1>
<div class="friend-search">
    <ul class="search-results">
<!--       Dynamically populates the list of pending friendships with the option to cancel the request -->
        <?php foreach ($fr_sent as $id => $name): ?>
            <li class="friends-res">
                <?= htmlspecialchars($name) ?> - <button class="cancel-request" data-id="<?= $id ?>">Cancel Friend Request</button>
            </li>
        <?php endforeach; ?>
    </ul>
</div>

<h1>Friend Requests Received</h1>
<div class="friend-search">
    <ul class="search-results">
<!--       Dynamically populates the list of pending friendships TO the current user allowing them to accept or deny them -->
        <?php foreach ($fr_received as $id => $name): ?>
        <li class="friends-res">
            <?= htmlspecialchars($name) ?> - <button class="deny-request" data-id="<?= $id ?>">Deny Friend Request</button> <button class="accept-request" data-id="<?= get_uid($name) ?>">Accept Friend Request</button>
        </li>
        <?php endforeach; ?>
    </ul>
</div>

<script src="accept_request_script.js"></script>
<script src="deny_request_script.js"></script>
<script src="cancel_request_script.js"></script>
<script src="/../../scripts/global_scripts.js"></script>
<script src="/../../scripts/script.js"></script>
</body>
</html>
