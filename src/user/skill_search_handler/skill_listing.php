<?php
    if (session_status() === PHP_SESSION_NONE) {
      session_start();
    }

    $currentPage = basename($_SERVER['PHP_SELF']);

    require_once __DIR__ . '/../../inc/dbconn.inc.php';
    require_once __DIR__ . '/../../inc/functions.php';

    $id = (int)$_GET['id'];
    $listing = get_listings_by_id($id);
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title><?= $listing['title'] ?></title>
    <link rel="stylesheet" href="/styles/style.css">
    <link rel="stylesheet" href="skill_search_handler/skill_search_style.css" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" rel="stylesheet">
  </head>
  <body>
    <?php 
    
      include_header($_SESSION['username'] ?? null);

     ?>

    <div class="page-wrapper">
      <main class="content">
        <a id="back" href="../skill_search.php"><i class="fa-solid fa-xmark"></i></a>
        <h1 class="list-heading"><?= htmlspecialchars($listing['title']) ?></h1>
        <ul>
          <li>
            <p class="user">By <?= get_username($listing['user_id']) ?></p>
            <h3><?= htmlspecialchars($listing['price']) ?> FUSS Credits</h3>
            <h3><?= htmlspecialchars($listing['topic']) ?></h3>
            <p><?= htmlspecialchars($listing['description']) ?></p>
            <p><?= $listing['is_negotiable'] === 1
                  ? htmlspecialchars('Price is Negotiable')
                  : htmlspecialchars('Price is NOT Negotiable'); ?>
            </p>
            <p class="price"></p>
            <p>Likes: <?= htmlspecialchars($listing['likes']) ?></p>
          </li>
        </ul>
      </main>
      
    </div>
    <script src="../scripts/global_scripts.js"></script>
    <script src="../scripts/script.js"></script>
  </body>
</html>
