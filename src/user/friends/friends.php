<?php

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

$currentPage = basename($_SERVER['PHP_SELF']);

require_once __DIR__ . '/../../inc/dbconn.inc.php';
require_once __DIR__ . '/../../inc/functions.php';

$uid = get_uid($_SESSION['username']);

$sql = 'SELECT friend_id FROM Friendships WHERE user_id = ?;';
$statement = $conn->prepare($sql);
$statement->bind_param('i', $uid);
$statement->execute();
$result = $statement->get_result();

$friend_ids = [];

while ($row = $result->fetch_assoc()) {
    $friend_ids[] = $row['friend_id'];
}
$statement->close();

$friend_names = [];

$sql = 'SELECT user_name FROM Users WHERE id = ?;';
$statement = $conn->prepare($sql);

foreach ($friend_ids as $id) {
    $statement->bind_param('i', $id);
    $statement->execute();
    $result = $statement->get_result();
    $row = $result->fetch_assoc();
    $friend_names[$id] = $row['user_name'];
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

<h1>Friend List</h1>
<div class="friend-search">
    <ul class="search-results">
        <?php foreach ($friend_names as $fid => $name): ?>
        <li class="friends-res">
            <?= htmlspecialchars($name) ?> - <button class="remove-friend" data-id="<?= $fid ?>">Remove</button>
        </li>
        <?php endforeach; ?>
    </ul>
</div>

<script src="remove_friend_script.js" type="text/javascript"></script>
<script src="/../../scripts/global_scripts.js"></script>
<script src="/../../scripts/script.js"></script>
</body>
</html>
