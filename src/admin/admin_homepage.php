<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if (!isset($_SESSION['username'])) {
    header("Location: ../index.php");
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
  </head>
  <body>
    <?php 
     include('../inc/admin_header.php');
     ?>

    <!-- Main Content -->
     <main class="content">
     <div class="welcome-section">
        <h2 class="welcome-message"> Good to have you back, </h2>
        <h1 class="welcome-name"> <?php echo isset($_SESSION['username']) ? htmlspecialchars($_SESSION['username']) : 'Guest'; ?> </h1>
        <h2 class="welcome-message"> Take a look around to see announcements and news.  </h2>
      </div>
      </main>
  </body>
</html>
