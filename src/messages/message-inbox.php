<?php
    if (session_status() === PHP_SESSION_NONE) {
      session_start();
    }

    $currentPage = basename($_SERVER['PHP_SELF']);
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>User Home Page</title>
    <link rel="stylesheet" href="../styles/style.css" />
  </head>
  <body>
    <?php 
     include('../inc/user-header.php');
     ?>
  
    <!-- Main Content -->
     <div class="page-wrapper">
      <div class="sidebar" id="sidebar">
      <div class="sidebar-header">
        <span class="sidebar-title">Chats</span> 
      </div>
      <ul class="menu">
        <li><i class="icon">🛒</i><span class="text">Request a Service</span></li>
        <li><i class="icon">📦</i><span class="text">Post Service</span></li>
      </ul>
    </div>

    <main class="content">
        <h1>Skill Post</h1>
    </main>
    </div>

    <script src="../scripts/global_scripts.js"></script>
    <script src="../scripts/script.js"></script>
  </body>
</html>
