<?php

    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }

    $currentPage = basename($_SERVER['PHP_SELF']);

    require_once __DIR__ . '/../inc/dbconn.inc.php';
    require_once __DIR__ . '/../inc/functions.php';

    $uid = get_uid($_SESSION['username']);
    $no_pending = false;
    $no_confirmed = false;

    // Getting confirmed bookings
    $sql = "SELECT booking_id, service_provider_id, start, end, service_id FROM Bookings WHERE booker_id = ? AND status = 'confirmed' AND booker_confirm = FALSE;";
    $statement = $conn->prepare($sql);
    $statement->bind_param('i', $uid);
    $statement->execute();
    $result = $statement->get_result();

    $confirmed_listings = [];

    while ($row = $result->fetch_assoc()) {
        $confirmed_listings[] = $row;
    }
    if ($result->num_rows === 0) {
        $no_confirmed = true;
    }

    $statement->close();

    // Getting pending bookings
    $sql = "SELECT service_provider_id, start, end, service_id FROM Bookings WHERE booker_id = ? AND status = 'pending';";
    $statement = $conn->prepare($sql);
    $statement->bind_param('i', $uid);
    $statement->execute();
    $result = $statement->get_result();

    $pending_listings = [];

    while ($row = $result->fetch_assoc()) {
        $pending_listings[] = $row;
    }
    if ($result->num_rows === 0) {
        $no_pending = true;
    }

    $statement->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>FUSS</title>
    <link rel="stylesheet" href="/styles/style.css" />
    <link rel="stylesheet" href="skill_management_handler/skill_manage_style.css" />
</head>
<body>
<?php
    include_header($_SESSION['username'] ?? null);
?>

<h1>Skills You Booked: Confirmed</h1>
<div class="skills">
    <ul class="my-skills">
        <?php
            if ($no_confirmed) {
                echo '<h3 class="skill-title">You Have No Confirmed Bookings</h3>';
            }
            else foreach ($confirmed_listings as $listing):
        ?>
        <h3 class="skill-title"><?= htmlspecialchars(get_listing_name($listing['service_id'])) ?></h3>
            <div class="skill-el">
                <li class="skill-res">
                    <h5>By <?= htmlspecialchars(get_username($listing['service_provider_id'])) ?></h5>
                    <h5>Price: <?= htmlspecialchars(get_creds($listing['service_id'])) ?> FUSS Credit(s)</h5>
                    <h6>Booked in for:</h6>
                    <p>Start: <?= htmlspecialchars($listing['start']) ?></p>
                    <p>End: <?= htmlspecialchars($listing['end']) ?></p>
                </li>

                <div class="submit-btn">
                    <button class="btn confirm-btn"
                            data-bid="<?= $listing['booking_id'] ?>"
                            data-sid="<?= $listing['service_id'] ?>">
                        Confirm Service Completion
                    </button>
                </div>

                <div class="submit-btn">
                    <button class="btn cancel-btn"
                            type="button"
                            data-id='<?= json_encode([
                                    $listing['service_provider_id'],
                                    $listing['service_id'],
                                    get_listing_name($listing['service_id']),
                                    get_creds($listing['service_id'])
                            ]) ?>'>
                        Cancel Service Booking
                    </button>
                </div>
            </div>
        <?php endforeach; ?>
    </ul>
</div>
<h1>Skills You Booked: Pending</h1>
<div class="skills">
    <ul class="my-skills">
        <?php
        if ($no_pending) {
            echo '<h3 class="skill-title">You Have No Pending Bookings</h3>';
        }
        else foreach ($pending_listings as $listing):
            ?>
            <h3 class="skill-title"><?= htmlspecialchars(get_listing_name($listing['service_id'])) ?></h3>
        <div class="skill-el">
            <li class="skill-res">
                <h5>By <?= htmlspecialchars(get_username($listing['service_provider_id'])) ?></h5>
                <h5>Price: <?= htmlspecialchars(get_creds($listing['service_id'])) ?> FUSS Credit(s)</h5>
                <h6>Booked in for:</h6>
                <p>Start: <?= htmlspecialchars($listing['start']) ?></p>
                <p>End: <?= htmlspecialchars($listing['end']) ?></p>
            </li>

            <div class="submit-btn">
                <button class="btn cancel-btn"
                        type="button"
                        data-id='<?= json_encode([
                                $listing['service_provider_id'],
                                $listing['service_id'],
                                get_listing_name($listing['service_id']),
                                get_creds($listing['service_id'])
                        ]) ?>'>
                    Cancel
                </button>
            </div>
        </div>
        <?php endforeach; ?>
    </ul>
</div>
<!-- Review Modal -->
<div id="reviewModal" class="modal">
    <div class="modal-content">
        <h3>Confirm Service Completion</h3>

        <label for="reviewType">Review Type:</label>
        <select id="reviewType">
            <option value="positive">Positive</option>
            <option value="neutral">Neutral</option>
            <option value="negative">Negative</option>
        </select>

        <div class="like-buttons">
            <button id="likeBtn" class="like">👍 Like</button>
            <button id="dislikeBtn" class="dislike">👎 Dislike</button>
        </div>
        <p>Review: 500 Characters Max</p>
        <textarea id="reviewText" placeholder="Write your review here..."></textarea>

        <div class="modal-actions">
            <button id="confirmSubmit" class="btn">Submit Review</button>
            <button id="cancelModal" class="btn cancel">Cancel</button>
        </div>
    </div>
</div>

<script src="skill_management_handler/booker_accept_script.js"></script>
<script src="skill_management_handler/cancel_booking_script.js"></script>
</body>
</html>
