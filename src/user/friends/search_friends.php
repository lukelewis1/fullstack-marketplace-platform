<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

$currentPage = basename($_SERVER['PHP_SELF']);

require_once __DIR__ . '/../../inc/dbconn.inc.php';
require_once __DIR__ . '/../../inc/functions.php';
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

    <h1>Friend Search Area</h1>

    <div class="friend-search-bar">
        <form id="friend-form" method="get" action="friend_results.php">
            <input
                    type="search"
                    id="search-input"
                    name="q"
                    placeholder="Search for Friends"
            />
        </form>
    </div>
</div>

<script src="/../../scripts/global_scripts.js"></script>
<script src="/../../scripts/script.js"></script>

</body>
</html>
