<?php
    if (session_status() === PHP_SESSION_NONE) {
      session_start();
    }

    $currentPage = basename($_SERVER['PHP_SELF']);

    require_once __DIR__ . '/../inc/dbconn.inc.php';
    require_once __DIR__ . '/../inc/functions.php';

    $uid = get_uid($_SESSION['username']);

    $sql = "SELECT * FROM Listings WHERE user_id = ? ORDER BY listing_id;";
    $statement = $conn->prepare($sql);
    $statement->bind_param('i', $uid);
    $statement->execute();
    $result = $statement->get_result();

    $my_skills = [];

    while ($row = $result->fetch_assoc()) {
        $lid = $row['listing_id'];

        // Fetch availability for this listing
        $sql = "SELECT * FROM Availability WHERE service_id = ?";
        $availStmt = $conn->prepare($sql);
        $availStmt->bind_param('i', $lid);
        $availStmt->execute();
        $ares = $availStmt->get_result();

        $availability = [];
        while ($arow = $ares->fetch_assoc()) {
            $availability[] = $arow;
        }

        $row['availability'] = $availability; // add as a nested array
        $my_skills[] = $row;

        $availStmt->close();
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

                    <br>

                    <h4>Availability</h4>
                    <ul class="avail-list">
                        <?php foreach ($skill['availability'] as $avail): ?>
                            <li class="avail-item">
                                <h5><?= htmlspecialchars($avail['day']) ?>:</h5>
                                <p>Start: <?= htmlspecialchars($avail['start']) ?></p>
                                <p>End: <?= htmlspecialchars($avail['end']) ?></p>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                </li>
            <?php endforeach; ?>
        </ul>
    </div>

    <script src="../scripts/global_scripts.js"></script>
    <script src="../scripts/script.js"></script>
  </body>
</html>
