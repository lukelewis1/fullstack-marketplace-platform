<?php
    if (session_status() === PHP_SESSION_NONE) {
      session_start();
    }

    $currentPage = basename($_SERVER['PHP_SELF']);

    require_once __DIR__ . '/../inc/dbconn.inc.php';
    require_once __DIR__ . '/../inc/functions.php';

    $uid = get_uid($_SESSION['username']);

    $sql = "SELECT * FROM Listings WHERE user_id = ?;";
    $statement = $conn->prepare($sql);
    $statement->bind_param('i', $uid);
    $statement->execute();
    $result = $statement->get_result();

    $my_skills = [];

    while ($row = $result->fetch_assoc()) {
        $my_skills[] = $row;
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
        <link rel="stylesheet" href="skill_management_handler/skill_manage_style.css" />
  </head>
  <body>
    <?php 
     include_header($_SESSION['username'] ?? null);
     ?>

    <h1>My Skills/Services</h1>
    <div class="skills">
        <ul class="my-skills">

            <?php foreach ($my_skills as $skill): ?>
            <h3><?= htmlspecialchars($skill['title']) ?></h3>
                <li class="skill-res">
                    <h5><?= htmlspecialchars($skill['topic']) ?></h5>
                    <p><?= htmlspecialchars($skill['description']) ?></p>
                    <p><?= htmlspecialchars($skill['price']) ?> FUSS Credits</p>
                    <p><?= $skill['is_negotiable'] === 1
                                ? htmlspecialchars('Price is Negotiable')
                                : htmlspecialchars('Price is NOT Negotiable'); ?>
                    </p>
                    <p>Successful Exchanges: <?= htmlspecialchars($skill['successful_exchanges']) ?></p>
                    <p>Likes: <?= htmlspecialchars($skill['likes']) ?></p>
                    <p>Dislikes: <?= htmlspecialchars($skill['dislikes']) ?></p>
                    <?php endforeach; ?>
                </li>
        </ul>
    </div>

    <script src="../scripts/global_scripts.js"></script>
    <script src="../scripts/script.js"></script>
  </body>
</html>
