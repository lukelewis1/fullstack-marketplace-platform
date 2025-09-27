<?php
    if (session_status() === PHP_SESSION_NONE) {
      session_start();
    }

    $currentPage = basename($_SERVER['PHP_SELF']);

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
      <link rel="stylesheet" href="skill_post_handler/skill_post_styles.css" />
  </head>
  <body>
    <?php

     include_header($_SESSION['username'] ?? null);

     ?>

    <main class="content">
      <div id="post-page">
          <form id="post-form" method="post" action="skill_post_handler/skill_post_loader.php">

              <div class="posting-field">
                  <label for="title">Service/Skill Name:</label>
                  <input type="text" id="title" name="skill-name" required>
              </div>

              <div class="posting-field">
                  <label for="topic">Relevant Topic/Degree:</label>
                  <input type="text" id="topic" name="topic-name" required>
              </div>

              <div class="posting-field">
                  <label for="category">Select the Most Relevant Option:</label>
                  <select id="category" name="category-name" required>
                      <option value="">-- Please choose an option --</option>
                      <option value="tutoring">Tutoring</option>
                      <option value="life_skill">Life Skill</option>
                      <option value="tech_support">Tech Support</option>
                      <option value="technical">Technical</option>
                      <option value="practical">Practical</option>
                  </select>
              </div>

              <div class="posting-field">
                  <label for="description">Description of Skill/Service:</label>
                  <textarea id="description" rows="15" cols="45" name="description" placeholder="Describe your skill or service in detail..."></textarea>
              </div>

              <div class="posting-field">
                  <label for="price">Enter the Amount of FUSS Credits for This Service:</label>
                  <input type="number" id="price" name="price-name" required>
              </div>

              <div class="posting-field">
                  <fieldset>
                      <legend>Is the Price Negotiable?</legend>

                      <label>
                          <input type="radio" name="negotiable" value="1" required>
                          Yes
                      </label>

                      <label>
                          <input type="radio" name="negotiable" value="0">
                          No
                      </label>
                  </fieldset>
              </div>

              <div class="submit-btn">
                  <button class="btn" type="submit" name="full-reg">Post</button>
              </div>

          </form>
      </div>
    </main>

    <script src="../scripts/global_scripts.js"></script>
    <script src="../scripts/script.js"></script>
  </body>
</html>
