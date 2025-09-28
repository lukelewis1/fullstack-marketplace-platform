<?php

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

$currentPage = basename($_SERVER['PHP_SELF']);

require_once '../../inc/dbconn.inc.php';
require_once '../../inc/functions.php';

$input = $_GET['q'] ?? '';

$sql = "SELECT user_name FROM Users WHERE user_name LIKE CONCAT('%', ?, '%');";
$statement = $conn->prepare($sql);
$statement->bind_param('s', $input);
$statement->execute();
$result = $statement->get_result();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>FUSS</title>
    <link rel="stylesheet" href="../../styles/style.css" />
    <link rel="stylesheet" href="friend_style.css" />
</head>
<body>
<?php
include_header($_SESSION['username'] ?? null);
?>

<div class="friend-search">
    <div class="friend-search-bar">
        <form id="friend-form" method="get" action="search_friends.php">
            <input
                type="search"
                id="search-input"
                name="q"
                placeholder="Search for Friends"
            />
        </form>

        <ul id="search-results">
            <?php while ($row = $result->fetch_assoc()): ?>
                <li class="friends-res"><?= htmlspecialchars($row['user_name']) ?></li>
            <?php endwhile; ?>
        </ul>
        <?php $statement->close(); ?>
    </div>
</div>


<script src="/../../scripts/global_scripts.js"></script>
<script src="/../../scripts/script.js"></script>

</body>
</html>
