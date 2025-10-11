<?php

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

$currentPage = basename($_SERVER['PHP_SELF']);

require_once __DIR__ . '/../../inc/dbconn.inc.php';
require_once __DIR__ . '/../../inc/functions.php';

$uid = get_uid($_SESSION['username']);

// Gets all current friendships for the user,
// needs union so it gets friendships initiated from either current user or another user
$sql = "SELECT friend_id FROM Friendships WHERE user_id = ? AND status = 'accepted'
        UNION
        SELECT user_id FROM Friendships WHERE friend_id = ? AND status = 'accepted';";
$statement = $conn->prepare($sql);
$statement->bind_param('ii', $uid, $uid);
$statement->execute();
$result = $statement->get_result();

$friend_ids = [];
while ($row = $result->fetch_assoc()) {
    $friend_ids[] = $row['friend_id'] ?? $row['user_id']; // handles either column
}
$statement->close();

$friend_names = [];

$sql = 'SELECT user_name FROM Users WHERE id = ?;';
$statement = $conn->prepare($sql);

// Gets usernames for ids so that the list is indexed in user ids with values of the corresponding names
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
<!--       Dynamically populates the list of current friends with an option to remove them -->
        <?php foreach ($friend_names as $fid => $name): ?>
        <li class="friends-res">
            <a href="../profile_handler/view_users_profile.php?id=<?= $fid ?>" class="friend-link">
                <?= htmlspecialchars($name) ?>
            </a> - <button class="remove-friend" data-id="<?= $fid ?>">Remove</button>
        </li>
        <?php endforeach; ?>
    </ul>
</div>

<script src="remove_friend_script.js" type="text/javascript"></script>
<script src="/../../scripts/global_scripts.js"></script>
<script src="/../../scripts/script.js"></script>
</body>
</html>
