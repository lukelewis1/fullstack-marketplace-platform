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
     include('../inc/admin-header.php');
     ?>

    <!-- Main Content -->
     <h1> User Management </h1>

    <main></main>
  </body>
</html>
