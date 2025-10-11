<!-- Authored by Oliver Wuttke, FAN WUTT0019, Edited by (Oliver Wuttke, FAN WUTT0019) -->

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
    $sql = "SELECT booking_id, booker_id, start, end, service_id FROM Bookings WHERE service_provider_id = ? AND status = 'confirmed' AND provider_confirm = FALSE;";
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
    $sql = "SELECT booking_id, booker_id, start, end, service_id FROM Bookings WHERE service_provider_id = ? AND status = 'pending';";
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

<h1>My Confirmed Skill Bookings</h1>
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
                    <h5>Booked By <?= htmlspecialchars(get_username($listing['booker_id'])) ?></h5>
                    <h5>Price: <?= htmlspecialchars(get_creds($listing['service_id'])) ?> FUSS Credit(s)</h5>
                    <h6>Booked in for:</h6>
                    <p>Start: <?= htmlspecialchars($listing['start']) ?></p>
                    <p>End: <?= htmlspecialchars($listing['end']) ?></p>
                </li>

                <div class="submit-btn">
                    <button class="btn confirm-btn"
                            type="button"
                            data-id="<?=
                            $listing['booking_id']
                            ?>">
                        Confirm Service Completion
                    </button>
                </div>

                <div class="submit-btn">
                    <button class="btn cancel-btn"
                            type="button"
                            data-id='<?= json_encode([
                                $listing['booker_id'],
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
<h1>My Pending Skill Bookings</h1>
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
                    <h5>Booked By <?= htmlspecialchars(get_username($listing['booker_id'])) ?></h5>
                    <h5>Price: <?= htmlspecialchars(get_creds($listing['service_id'])) ?> FUSS Credit(s)</h5>
                    <h6>Booked in for:</h6>
                    <p>Start: <?= htmlspecialchars($listing['start']) ?></p>
                    <p>End: <?= htmlspecialchars($listing['end']) ?></p>
                </li>

                <div class="submit-btn">
                    <button class="btn pending-conf"
                            type="button"
                            data-id="<?= $listing['booking_id'] ?>">
                        Confirm Booking
                    </button>
                </div>

                <div class="submit-btn">
                    <button class="btn cancel-btn"
                            type="button"
                            data-id='<?= json_encode([
                                $listing['booker_id'],
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
<script src="skill_management_handler/provider_accept_script.js"></script>
<script src="skill_management_handler/my_cancel_booking_script.js"></script>
<script src="skill_management_handler/confirm_booking_script.js"></script>
</body>
</html>
