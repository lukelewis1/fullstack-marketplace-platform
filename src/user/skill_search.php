<?php
    if (session_status() === PHP_SESSION_NONE) {
      session_start();
    }

    $currentPage = basename($_SERVER['PHP_SELF']);

    require_once __DIR__ . '/../inc/dbconn.inc.php';
    require_once __DIR__ . '/../inc/functions.php';

    $results = get_popular();
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>User Home Page</title>
    <link rel="stylesheet" href="../styles/style.css">
    <link rel="stylesheet" href="/user/friends/friend_style.css" />
    <link rel="stylesheet" href="skill_search_handler/skill_search_style.css" />
  </head>
  <body>
    <?php 
    
      include_header($_SESSION['username'] ?? null);

     ?>

    <div class="page-wrapper">

    <main class="content">

      <h1>Skill Search</h1>

      <div class="friend-search-bar">
        <form id="friend-form" method="get" action="friend_results.php">
            <input
                    type="search"
                    id="search-input"
                    name="q"
                    placeholder="Search for Skills"
            />
        </form>
    </div>

    <div class="skills">
      <h1>Trending Services</h1>
      <ul class="skill-listings">
        <?php 
          foreach ($results as $listing):
        ?>
        
        
        <li class="skill-item">
          <a href="/user/skill_listing.php?id=<?= (int)$listing['listing_id'] ?>">
            <h3><?= htmlspecialchars($listing['title']) ?></h3>
            <p><?= htmlspecialchars($listing['topic']) ?></p>
            <p class="price"><?= htmlspecialchars($listing['price']) ?> FUSS Credits</p>
            <p>Likes: <?= htmlspecialchars($listing['likes']) ?></p>
          </a>
        </li>
        <?php 
          endforeach; 
        ?>
      </ul>
    </div>
    
  </main>
  </div>

    <script src="../scripts/global_scripts.js"></script>
    <script src="../scripts/script.js"></script>
  </body>
</html>
