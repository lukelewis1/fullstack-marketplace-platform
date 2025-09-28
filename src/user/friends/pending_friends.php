<?php

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

$currentPage = basename($_SERVER['PHP_SELF']);

require_once __DIR__ . '/../../inc/dbconn.inc.php';
require_once __DIR__ . '/../../inc/functions.php';

$uid = get_uid($_SESSION['username']);

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

        <li class="friends-res">

        </li>
    </ul>
</div>

<script src="cancel_request_script.js"></script>
<script src="/../../scripts/global_scripts.js"></script>
<script src="/../../scripts/script.js"></script>
</body>
</html>
