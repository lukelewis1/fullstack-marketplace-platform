<?php
// Start session and check login before any HTML output
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
  include('../inc/user-header.php');
  ?>
    
    
    <main class="content">
      <h1> User Home Page </h1>
    </main>
     

    

    <script src="../scripts/global_scripts.js"></script>
  </body>
</html>
