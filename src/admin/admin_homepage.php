<?php
//<!-- Authored by Hans Pujalte, FAN PUJA0009 -->
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

    <div class="page-wrapper">

    <?php 
     include('../inc/admin_header.php');
     ?>

    <!-- Main Content -->
     <main class="content">

     <!-- Welcome Section -->
     <div class="welcome-section">
        <h2 class="welcome-message"> Good to have you back, </h2>
        <h1 class="welcome-name"> <?php echo isset($_SESSION['username']) ? htmlspecialchars($_SESSION['username']) : 'Guest'; ?> </h1>
        <h2 class="welcome-message"> Take a look around to see announcements and news.  </h2>
      </div>

      <!-- News/Announcements Section -->
      <div class="news-container"> 
          <div class="it-card-container">
            <a href="#" class="it-card-link">
              <img src="../images/news/news_1.png" alt="Image of university students outside" class="it-card-image">
              <div class="it-card-content">
                <h3 class="it-card-title">Clubs & Societies Fair – Week 3 in the Plaza</h3>
                <p class="it-card-description">Explore a variety of student clubs and societies, meet members, and discover new opportunities on campus.</p>
                <span class="it-card-action">Learn More</span>
              </div>
            </a>
          </div>

          <div class="it-card-container">
            <a href="#" class="it-card-link">
              <img src="../images/news/news_2.png" alt="Image of the Flinders University Bedford campus" class="it-card-image">
              <div class="it-card-content">
                <h3 class="it-card-title">Library Extended Hours During Mid-Semester Exams</h3>
                <p class="it-card-description">Study longer with the library's extended opening hours, providing extra time and resources during exam week.</p>
                <span class="it-card-action">Learn More</span>
              </div>
            </a>
          </div>

          <div class="it-card-container">
            <a href="#" class="it-card-link">
              <img src="../images/news/news_3.png" alt="Image of a university fair" class="it-card-image">
              <div class="it-card-content">
                <h3 class="it-card-title">Free Mental Health Workshops This Month</h3>
                <p class="it-card-description">Join workshops focused on stress management, mindfulness, and wellbeing, open to all students and staff.</p>
                <span class="it-card-action">Learn More</span>
              </div>
            </a>
          </div>

          <div class="it-card-container">
            <a href="#" class="it-card-link">
              <img src="../images/news/news_4.png" alt="Image of a bouldering gym" class="it-card-image">
              <div class="it-card-content">
                <h3 class="it-card-title">Should Flinders build a bouldering gym?</h3>
                <p class="it-card-description">Have your say! Share your thoughts on whether a new bouldering facility would benefit the student community.</p>
                <span class="it-card-action">Learn More</span>
              </div>
            </a>
          </div>
      </div>

      
      </main>
    </div>
  </body>
</html>
