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

      <div class="stats-container"> 

          <div class="it-stats-container">
              <div class="it-stats-content">
                <h3 class="it-stats-title">Total Users</h3>
                <span style="background-color: green;" class="stats-circle">50
                </span>
              </div>
          </div>

      <div class="it-stats-container">
            <div class="it-stats-content">
              <h3 class="it-stats-title">Banned Users</h3>
              <span style="background-color: red;"class="stats-circle">50
            </div>
      </div>

        <div class="it-stats-container">
            <div class="it-stats-content">
              <h3 class="it-stats-title">Active Services</h3>
              <span style="background-color: orange;"class="stats-circle">50
            </div>
        </div>

        <div class="it-stats-container">
            <div class="it-stats-content">
              <h3 class="it-stats-title">Total Credit Distribution</h3>
              <span style="background-color: grey;"class="stats-circle">50
            </div>
        </div>

        <div class="it-stats-container" style="width: 80%; height: 500px;">
            <div class="it-stats-content">
              <h3 class="it-stats-title">Recent Skills</h3>
            </div>
        </div>

    </main>
    
  </body>
</html>
