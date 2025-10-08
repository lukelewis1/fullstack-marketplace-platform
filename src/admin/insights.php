<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if (!isset($_SESSION['username'])) {
    header("Location: ../index.php");
    exit;
}

require_once __DIR__ . '/../inc/dbconn.inc.php';
require_once __DIR__ . '/../inc/functions.php';
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
                <span style="background-color: green;" class="stats-circle">
                  <?php 
                  $sql = "SELECT COUNT(*) AS total_users FROM Users";
                  $result = $conn->query($sql);
                  $row = $result->fetch_assoc();
                  echo $row['total_users'];
                  ?>
                </span>
              </div>
          </div>

      <div class="it-stats-container">
            <div class="it-stats-content">
              <h3 class="it-stats-title">Banned Users</h3>
              <span style="background-color: red;"class="stats-circle">50 </span>
            </div>
      </div>

        <div class="it-stats-container">
            <div class="it-stats-content">
              <h3 class="it-stats-title">Active Services</h3>
              <span style="background-color: orange;"class="stats-circle">
                <?php 
                  $sql = "SELECT COUNT(*) AS total_listings FROM Listings";
                  $result = $conn->query($sql);
                  $row = $result->fetch_assoc();
                  echo $row['total_listings'];
                  ?>
              </span>
            </div>
        </div>

        <div class="it-stats-container">
            <div class="it-stats-content">
              <h3 class="it-stats-title">Total Credit Distribution</h3>
              <span style="background-color: grey;"class="stats-circle"> 
                <?php 
                $sql = "SELECT SUM(fuss_credit) AS total_fuss_credit FROM Users";
                $result = $conn->query($sql);
                $row = $result->fetch_assoc();
                echo $row['total_fuss_credit'];
                ?>
              </span>
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

<!-- $sql = "SELECT SUM(fuss_credit) AS total_fuss_credit FROM your_table_name";
$result = $mysqli->query($sql);

if ($result) {
    $row = $result->fetch_assoc();
    echo "Total fuss credit: " . $row['total_fuss_credit'];
} else {
    echo "Error: " . $mysqli->error;
} -->
