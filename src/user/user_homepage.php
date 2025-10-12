<?php
//<!-- Authored by Hans Pujalte, FAN PUJA0009 -->

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

  <div class="page-wrapper">

  <?php
  include('../inc/user_header.php');
  ?>
    
    <!-- Parent Content Container -->
    <main class="content">
      
      <!-- Dynamic Welcome Section -->
      <div class="welcome-section">
        <h2 class="welcome-message"> Good to have you back, </h2>
        <h1 class="welcome-name"> <?php echo isset($_SESSION['username']) ? htmlspecialchars($_SESSION['username']) : 'Guest'; ?> </h1>
        <h2 class="welcome-message"> Take a look around to see announcements and news.  </h2>
      </div>

      <!-- News/Announcements Section -->
      <div class="news-container"> 

        <!-- Individual Child Container --> 
            <div class="news-card-container">
              <img src="../images/news/news_1.png" alt="Image of university students outside" class="news-card-image">
              <div class="news-card-content">
                <h3 class="news-card-title">Clubs & Societies Fair – Week 3 in the Plaza</h3>
                <p class="news-card-description">Explore a variety of student clubs and societies, meet members, and discover new opportunities on campus.</p>
                <span class="news-card-action">Learn More</span>
              </div>
          </div>

          <div class="news-card-container">
              <img src="../images/news/news_2.png" alt="Image of the Flinders University Bedford campus" class="news-card-image">
              <div class="news-card-content">
                <h3 class="news-card-title">Library Extended Hours During Mid-Semester Exams</h3>
                <p class="news-card-description">Study longer with the library's extended opening hours, providing extra time and resources during exam week.</p>
                <span class="news-card-action">Learn More</span>
              </div>
          </div>

          <div class="news-card-container">
              <img src="../images/news/news_3.png" alt="Image of a university fair" class="news-card-image">
              <div class="news-card-content">
                <h3 class="news-card-title">Free Mental Health Workshops This Month</h3>
                <p class="news-card-description">Join workshops focused on stress management, mindfulness, and wellbeing, open to all students and staff.</p>
                <span class="news-card-action">Learn More</span>
              </div>
          </div>

          <div class="news-card-container">
              <img src="../images/news/news_4.png" alt="Image of a bouldering gym" class="news-card-image">
              <div class="news-card-content">
                <h3 class="news-card-title">Should Flinders build a bouldering gym?</h3>
                <p class="news-card-description">Have your say! Share your thoughts on whether a new bouldering facility would benefit the student community.</p>
                <span class="news-card-action">Learn More</span>
              </div>

          </div>
      </div>
    </div>

    </main>
     
    <script src="../scripts/global_scripts.js"></script>
  </body>
</html>
