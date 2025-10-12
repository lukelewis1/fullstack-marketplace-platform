<?php
//<!-- Authored by Luke Lewis, FAN lewi0454, Edited by (Luke Lewis, FAN lewi0454) -->
    if (session_status() === PHP_SESSION_NONE) {
      session_start();
    }

    $currentPage = basename($_SERVER['PHP_SELF']);

    require_once __DIR__ . '/../../inc/dbconn.inc.php';
    require_once __DIR__ . '/../../inc/functions.php';

    $bookingId = $_GET['booking_id'];
    $booking = get_booking_details($bookingId);
    $listing = get_listings_by_id($booking['service_id']);

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title><?= $listing['title'] ?></title>
    <link rel="stylesheet" href="/styles/style.css">
    <link rel="stylesheet" href="skill_search_handler/skill_search_style.css" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" rel="stylesheet">
  </head>
  <body>
    <?php 
    
      include_header($_SESSION['username'] ?? null);

     ?>

    <div class="page-wrapper">
      <main class="content">
        <!-- <a id="back" href="../skill_search.php"><i class="fa-solid fa-xmark"></i></a> -->
        <h1 class="list-heading">Booking #<?= $bookingId ?> request has been sent to <?= get_username($booking['service_provider_id']) ?>.</h1>
        <section class="card">
          <h2><?= ($listing['title']) ?></h2>
          <p><strong>When:</strong>
            <?= ((new DateTime($booking['start']))->format('D, d M Y · H:i')) ?>
            — <?= ((new DateTime($booking['end']))->format('H:i')) ?>
          </p>
          <p><strong>Price:</strong> <?= ($listing['price']) ?> FUSS credits</p>
          <?php if (!empty($booking['topic'])): ?>
            <p><strong>Topic:</strong> <?= ($booking['topic']) ?></p>
          <?php endif; ?>
          <?php if (!empty($booking['description'])): ?>
            <p><?= ($booking['description']) ?></p>
          <?php endif; ?>
        </section>
        <p><a href="/user/skill_search_handler/skill_listing.php?id=<?= ($booking['service_id']) ?>">Back to listing</a></p>
        <p><a href="/user/skill_search.php">Back to search</a></p>
      </main>
    </div>
    <script src="./confirmation_popup_script.js"></script>
    <script src="../scripts/global_scripts.js"></script>
    <script src="../scripts/script.js"></script>
  </body>
</html>
