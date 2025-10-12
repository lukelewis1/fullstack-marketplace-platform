<?php
//<!-- Authored by Oliver Wuttke, FAN WUTT0019, Edited by (Oliver Wuttke, FAN WUTT0019) -->
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

$currentPage = basename($_SERVER['PHP_SELF']);

require_once __DIR__ . '/../inc/dbconn.inc.php';
require_once __DIR__ . '/../inc/functions.php';

$file = __DIR__ . "/../data/skill_categories.json";

// Load current skill categories
$categories = [];
if (file_exists($file)) {
    $categories = json_decode(file_get_contents($file), true) ?? [];
}

// Adds new one
if (isset($_POST['add'])) {
    $new = trim($_POST['new_item']);
    if ($new !== '') {
        $categories[] = $new;
        file_put_contents($file, json_encode($categories, JSON_PRETTY_PRINT));
    }
    header("Location: ".$_SERVER['PHP_SELF']);
    exit;
}

// Removes on delete
if (isset($_POST['delete'])) {
    $index = (int)$_POST['delete'];
    if (isset($categories[$index])) {
        array_splice($categories, $index, 1);
        file_put_contents($file, json_encode($categories, JSON_PRETTY_PRINT));
    }
    header("Location: ".$_SERVER['PHP_SELF']);
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>User Home Page</title>
    <link rel="stylesheet" href="../styles/style.css" />
    <link rel="stylesheet" href="/styles/admin_skillcat_style.css" />
</head>
<body>
<?php
include_header($_SESSION['username'] ?? null);
?>

<h1>Skill Categories</h1>
<div class="skill-cat-res">

<!--    Displays list of current categories-->
    <ul>
        <?php foreach ($categories as $i => $item): ?>
            <li class="skill-cats">
                <?= htmlspecialchars($item) ?>
                <form method="post">
                    <button class="btn" type="submit" name="delete" value="<?= $i ?>">Delete</button>
                </form>
            </li>
        <br>
        <?php endforeach; ?>
    </ul>


<!--Allows text input for adding a new skill category-->
    <form method="post">
        <input type="text" name="new_item" placeholder="Add new category" required>
        <button type="submit" name="add" class="btn">Add</button>
    </form>
    <br>
</div>

</body>
</html>
