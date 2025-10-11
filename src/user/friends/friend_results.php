<?php
//<!-- Authored by Oliver Wuttke, FAN WUTT0019, Edited by (Oliver Wuttke, FAN WUTT0019) -->
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

$currentPage = basename($_SERVER['PHP_SELF']);

require_once '../../inc/dbconn.inc.php';
require_once '../../inc/functions.php';

$input = $_GET['q'] ?? '';

// Getting all users which are a match for the search
$sql = "SELECT id, user_name FROM Users WHERE user_name LIKE CONCAT('%', ?, '%');";
$statement = $conn->prepare($sql);
$statement->bind_param('s', $input);
$statement->execute();
$result = $statement->get_result();

$matches = [];

while ($row = $result->fetch_assoc()) {
    $matches[$row['user_name']] = $row['id'];
}
$statement->close();

//Finding out existing friendships
$uid = get_uid($_SESSION['username']);
$add = '';

$sql = 'SELECT user_id, friend_id, requester_id, status FROM Friendships WHERE user_id = ? OR friend_id = ?;';
$statement = $conn->prepare($sql);
$statement->bind_param('ii', $uid, $uid);
$statement->execute();
$result = $statement->get_result();

$friend_ids = [];
$id_stat = [];

//Matching status of friendship and friend ids
while ($row = $result->fetch_assoc()) {
    $other = ($row['user_id'] == $uid) ? $row['friend_id'] : $row['user_id'];
    $friend_ids[] = $other;
    $id_stat[$other] = [
            'status' => $row['status'],
            'requester_id' => $row['requester_id']
    ];
}

// Matching names to ids and replacing the button with suitable options depending on friendship status
foreach ($matches as $name => $id) {
    if (isset($id_stat[$id])) {
        $status    = $id_stat[$id]['status'];
        $requester = $id_stat[$id]['requester_id'];

        if ($status === 'accepted') {
            $matches[$name] = 'Already friends';
        } elseif ($status === 'pending') {
            if ($requester == $uid) {
                $matches[$name] = 'Request sent (pending)';
            } else {
                $matches[$name] = 'Request received (pending)';
            }
        }
    } else {
        $matches[$name] = '<button class="add-friend-btn" data-id="' . htmlspecialchars($id) . '">Add</button>';
    }
}
$statement->close();

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


<!-- Includes search bar that has same functionality as the one before that leads to this page -->
<div class="friend-search">
    <div class="friend-search-bar">
        <form id="friend-form" method="get" action="friend_results.php">
            <input
                type="search"
                id="search-input"
                name="q"
                placeholder="Search for Friends"
            />
        </form>

<!--       Dynamically populates the results with the appropriate buttons -->
        <ul class="search-results">
            <?php foreach ($matches as $username => $status): ?>
                <li class="friends-res">
                    <?= htmlspecialchars($username) ?> — <?= $status ?>
                </li>
            <?php endforeach; ?>
        </ul>
    </div>
</div>

<script src="add_friend_script.js"></script>
<script src="/../../scripts/global_scripts.js"></script>
<script src="/../../scripts/script.js"></script>

</body>
</html>
