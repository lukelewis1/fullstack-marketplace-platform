<!-- Authored by Oliver Wuttke, FAN WUTT0019, Edited by (Oliver Wuttke, FAN WUTT0019) -->

<?php
    if (session_status() === PHP_SESSION_NONE) {
      session_start();
    }

    $currentPage = basename($_SERVER['PHP_SELF']);

    require_once __DIR__ . '/../inc/dbconn.inc.php';
    require_once __DIR__ . '/../inc/functions.php';

    $file = __DIR__ . '/../data/skill_categories.json';

    // Load current skill categories
    $categories = [];
    if (file_exists($file)) {
        $categories = json_decode(file_get_contents($file), true) ?? [];
    }
?>

<!DOCTYPE html>
<html lang="en">
  <head>
      <meta charset="UTF-8" />
      <meta name="viewport" content="width=device-width, initial-scale=1.0" />
      <title>User Home Page</title>
      <link rel="stylesheet" href="../styles/style.css" />
      <link rel="stylesheet" href="skill_post_handler/skill_post_style.css" />
  </head>
  <body>
    <?php

     include_header($_SESSION['username'] ?? null);

     ?>

      <div id="post-page">

          <!-- Main form containing basic information needed for a service object -->

          <form id="post-form" method="post" action="skill_post_handler/skill_post_loader.php">

              <div class="posting-field">
                  <label for="title">Service/Skill Name:</label>
                  <input type="text" id="title" name="skill-name" required maxlength="50">
                  <div class="posting-err">Max 50 Characters</div>
              </div>

              <div class="posting-field">
                  <label for="topic">Relevant Topic/Degree:</label>
                  <input type="text" id="topic" name="topic-name" required maxlength="60">
                  <div class="posting-err">Max 60 Characters</div>
              </div>

              <div class="posting-field">
                  <label for="category">Select the Most Relevant Option:</label>
                  <select id="category" name="category-name" required>
                      <option value="">-- Please choose an option --</option>
                      <?php
                        foreach ($categories as $cat) {
                            echo '<option value="' . htmlspecialchars($cat) . '">' . htmlspecialchars($cat) . '</option>';
                        }
                      ?>
                  </select>
              </div>

              <div class="posting-field">
                  <label for="description">Description of Skill/Service: <span id="char-count">250</span> Characters Remaining</label>
                  <textarea id="description" rows="15" cols="75" name="description" maxlength="250" placeholder="Describe your skill or service in detail..."></textarea>
              </div>

              <div class="posting-field">
                  <label for="price">Enter the Amount of FUSS Credits for This Service:</label>
                  <input type="number" id="price" name="price-name" required min="1" max="99">
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

              <!-- Section for setting availability -->

              <label id="avail-label">Select your Availability for this Service/Skill:</label>

              <div class="scheduler">

                  <div class="day" data-day="monday">
                      <label>Monday</label>
                      <div class="timeslot">
                          <div class="slot">
                              <input type="time" name="monday_start[]">
                              <input type="time" name="monday_end[]">
                          </div>
                      </div>
                      <button type="button" class="add-slot">+ Add Timeslot</button>
                  </div>

                  <div class="day" data-day="tuesday">
                      <label>Tuesday</label>
                      <div class="timeslot">
                          <div class="slot">
                              <input type="time" name="tuesday_start[]">
                              <input type="time" name="tuesday_end[]">
                          </div>
                      </div>
                      <button type="button" class="add-slot">+ Add Timeslot</button>
                  </div>

                  <div class="day" data-day="wednesday">
                      <label>Wednesday</label>
                      <div class="timeslot">
                          <div class="slot">
                              <input type="time" name="wednesday_start[]">
                              <input type="time" name="wednesday_end[]">
                          </div>
                      </div>
                      <button type="button" class="add-slot">+ Add Timeslot</button>
                  </div>

                  <div class="day" data-day="thursday">
                      <label>Thursday</label>
                      <div class="timeslot">
                          <div class="slot">
                              <input type="time" name="thursday_start[]">
                              <input type="time" name="thursday_end[]">
                          </div>
                      </div>
                      <button type="button" class="add-slot">+ Add Timeslot</button>
                  </div>

                  <div class="day" data-day="friday">
                      <label>Friday</label>
                      <div class="timeslot">
                          <div class="slot">
                              <input type="time" name="friday_start[]">
                              <input type="time" name="friday_end[]">
                          </div>
                      </div>
                      <button type="button" class="add-slot">+ Add Timeslot</button>
                  </div>

                  <div class="day" data-day="saturday">
                      <label>Saturday</label>
                      <div class="timeslot">
                          <div class="slot">
                              <input type="time" name="saturday_start[]">
                              <input type="time" name="saturday_end[]">
                          </div>
                      </div>
                      <button type="button" class="add-slot">+ Add Timeslot</button>
                  </div>

                  <div class="day" data-day="sunday">
                      <label>Sunday</label>
                      <div class="timeslot">
                          <div class="slot">
                              <input type="time" name="sunday_start[]">
                              <input type="time" name="sunday_end[]">
                          </div>
                      </div>
                      <button type="button" class="add-slot">+ Add Timeslot</button>
                  </div>

              </div>

              <div class="submit-btn">
                  <button class="btn" type="submit" name="full-reg">Post</button>
              </div>

          </form>
      </div>
    <script src="skill_post_handler/min_timeslots_script.js"></script>
    <script src="../scripts/global_scripts.js"></script>
    <script src="skill_post_handler/time_slot_handler_script.js"></script>
    <script src="skill_post_handler/skill_post_validation_script.js"></script>
    <script src="../scripts/script.js"></script>

  </body>
</html>
