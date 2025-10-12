<?php
//<!-- Authored by Luke Lewis, FAN lewi0454, Edited by (Luke Lewis, FAN lewi0454) -->
    if (session_status() === PHP_SESSION_NONE) {
      session_start();
    }

    if (empty($_SESSION['csrf'])) {
      $_SESSION['csrf'] = bin2hex(random_bytes(16));
    }

    $currentPage = basename($_SERVER['PHP_SELF']);

    require_once __DIR__ . '/../../inc/dbconn.inc.php';
    require_once __DIR__ . '/../../inc/functions.php';

    $id = (int)$_GET['id'];
    $listing = get_listings_by_id($id);
    $slots = get_available_slots_for_listing((int)$listing['listing_id'], 30);
    $username     = $_SESSION['username'] ?? null;
    $userCredits  = $username ? (float)get_user_credits($username) : 0.0;
    $price        = (float)$listing['price'];

    $lid = $listing['listing_id'];
    $stmt = $conn->prepare("SELECT * FROM Reviews WHERE service_id = ?;");
    $stmt->bind_param('i', $lid);
    $stmt->execute();
    $result = $stmt->get_result();

    $reviews = [];

    while ($row = $result->fetch_assoc()) {
        $reviews[] = $row;
    }
    $stmt->close();
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
        <a id="back" href="../skill_search.php"><i class="fa-solid fa-xmark"></i></a>
        <h1 class="list-heading"><?= htmlspecialchars($listing['title']) ?></h1>
        <ul>
          <li>
            <a href="../profile_handler/view_users_profile.php?id=<?= (int)$listing['user_id'] ?>" class="friend-link">
                <p class="user">By <?= get_username($listing['user_id']) ?></p>
            </a>
            <h3><?= htmlspecialchars($listing['price']) ?> FUSS Credits</h3>
            <h3><?= htmlspecialchars($listing['topic']) ?></h3>
            <p><?= htmlspecialchars($listing['description']) ?></p>
            <p><?= $listing['is_negotiable'] === 1
                  ? htmlspecialchars('Price is Negotiable')
                  : htmlspecialchars('Price is NOT Negotiable'); ?>
            </p>
            <p class="price"></p>
            <p>Likes: <?= htmlspecialchars((string)($listing['likes'] ?? 0), ENT_QUOTES, 'UTF-8') ?></p>
          </li>
        </ul>
        <form id="booking-form" action="./booking_request.php" method="post">
        <section id="booking-root">
          <select id="availability-select" name="slot" required>
            <option selected disabled>Available times</option>
          </select>
        </section>

          <input type="hidden" name="listing_id" value="<?= (int)$listing['listing_id'] ?>">
          <input type="hidden" name="csrf" value="<?= htmlspecialchars($_SESSION['csrf'], ENT_QUOTES) ?>">

          <br><input type="submit" value="Request">
        </form>
          <div class="reviews-box">
              <h2>Reviews</h2>
              <ul class="reviews">
                  <?php foreach ($reviews as $rev): ?>
                  <li class="review">
                      <h5>Type: <?= htmlspecialchars($rev['type']) ?></h5>
                      <p><?= htmlspecialchars($rev['review']) ?></p>
                  </li>
                  <?php endforeach; ?>
              </ul>
          </div>
      </main>
      
    </div>
    <script>
      window.BOOKING_CONTEXT = {
        price: <?= json_encode($price) ?>,
        userCredits: <?= json_encode($userCredits) ?>,
        isLoggedIn: <?= json_encode((bool)$username) ?>
      };
      // Data from PHP
      const AVAILABLE_SLOTS = <?= json_encode($slots, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE) ?>;

      // Simple: fill a <select> with options from slots
      function populateAvailabilitySelect(selectEl, slots) {
        if (!selectEl) return;

        // Clear existing dynamic options (keep the first placeholder)
        while (selectEl.options.length > 1) selectEl.remove(1);

        if (!Array.isArray(slots) || slots.length === 0) {
          // Replace placeholder text if nothing available
          selectEl.options[0].textContent = 'No availability';
          selectEl.disabled = true;
          return;
        }

        // Add options: value as "start|end", label as human-readable
        for (const s of slots) {
          const opt = document.createElement('option');
          opt.value = `${s.start}|${s.end}`;
          opt.textContent = s.label ?? `${s.start} – ${s.end}`;
          selectEl.appendChild(opt);
        }
        selectEl.disabled = false;
      }

      // Run after DOM is ready
      document.addEventListener('DOMContentLoaded', () => {
        const sel = document.getElementById('availability-select');
        populateAvailabilitySelect(sel, AVAILABLE_SLOTS);
      });
    </script>
    <script src="./confirmation_popup_script.js?v=3" defer></script>
    <script src="../scripts/global_scripts.js"></script>
    <script src="../scripts/script.js"></script>
  </body>
</html>
