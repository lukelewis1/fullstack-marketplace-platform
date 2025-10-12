<?php
//<!-- Authored by Hans Pujalte, FAN PUJA0009 -->
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if (!isset($_SESSION['username'])) {
    header("Location: ../index.php");
    exit;
}

require_once __DIR__ . '/../inc/dbconn.inc.php';
require_once __DIR__ . '/../inc/functions.php';

// Fetch all services for display
$stmt_services = $conn->prepare("SELECT title, topic, type FROM Listings");
$stmt_services->execute();
$all_services = $stmt_services->get_result()->fetch_all(MYSQLI_ASSOC);
$stmt_services->close();
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Admin Insights Page</title>
    <link rel="stylesheet" href="../styles/style.css" />
  </head>
  <body>

    <!-- Include Admin Header -->
    <?php 
     include('../inc/admin_header.php');
     ?>

    <!-- Parent Main Content Container -->
    <main class="content">

    <!-- Child Stats Container -->
      <div class="stats-container"> 

          <!-- Individual Stats Container -->
          <!-- Note: Reused news container class and elements from homepage -->
          <div class="news-stats-container">
              <div class="news-stats-content">
                <h3 class="news-stats-title">Total Users</h3>
                <span style="background-color: green;" class="stats-circle">
                  <?php 
                  /// Get total users
                  $sql = "SELECT COUNT(*) AS total_users FROM Users"; 
                  $result = $conn->query($sql);
                  $row = $result->fetch_assoc();
                  echo $row['total_users'];
                  ?>
                </span>
              </div>
          </div>

      <div class="news-stats-container">
            <div class="news-stats-content">
              <h3 class="news-stats-title">Banned Users</h3>
              <span style="background-color: red;"class="stats-circle">50 </span>
            </div>
      </div>

        <div class="news-stats-container">
            <div class="news-stats-content">
              <h3 class="news-stats-title">Active Services</h3>
              <span style="background-color: orange;"class="stats-circle">
                <?php 
                /// Get total listings
                  $sql = "SELECT COUNT(*) AS total_listings FROM Listings";
                  $result = $conn->query($sql);
                  $row = $result->fetch_assoc();
                  echo $row['total_listings'];
                  ?>
              </span>
            </div>
        </div>

        <div class="news-stats-container">
            <div class="news-stats-content">
              <h3 class="news-stats-title">Total Credit Distribution</h3>
              <span style="background-color: grey;"class="stats-circle"> 
                <?php 
                /// Get total fuss credits in db
                $sql = "SELECT SUM(fuss_credit) AS total_fuss_credit FROM Users";
                $result = $conn->query($sql);
                $row = $result->fetch_assoc();
                echo $row['total_fuss_credit'];
                ?>
              </span>
            </div>
        </div>

        <!-- Note: Used some basic inline css rather than external for simplicity-->
        <div class="news-stats-container" style="width: 80%; margin: 0 auto;">
          <h1>Popular Services</h1>
          <div class="skills-list" style="display: flex; flex-direction: column; gap: 20px;">
              <?php 
              /// Get all services for display
              if (!empty($all_services)): ?>
                  <?php foreach ($all_services as $service): ?>
                      <div class="skill-box" style="border: 1px solid #ccc; padding: 15px; width: 100%;">
                          <strong><?= htmlspecialchars($service['title']) ?></strong>
                          <p>Topic: <?= htmlspecialchars($service['topic']) ?></p>
                          <p>Type: <?= htmlspecialchars($service['type']) ?></p>
                      </div>
                  <?php endforeach; ?>
              <?php else: ?>
                  <p>No skills listed yet</p>
              <?php endif; ?>
        </div>
      </div>


    </main>
  </body>
</html>
