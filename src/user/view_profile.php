<?php
session_start();

require_once __DIR__ . '/../inc/dbconn.inc.php';
require_once __DIR__ . '/../inc/functions.php';

$user_name = $_SESSION['username'] ?? '';
$message = "";

// Fetch user details
$stmt = $conn->prepare("SELECT id, f_name, l_name, email, bio, role 
                        FROM Users 
                        WHERE user_name = ?");
$stmt->bind_param('s', $user_name);
$stmt->execute();
$user = $stmt->get_result()->fetch_assoc() ?? [];
$stmt->close();

// Set defaults
$user_id    = $user['id'] ?? '';
$first_name = $user['f_name'] ?? '';
$last_name  = $user['l_name'] ?? '';
$email      = $user['email'] ?? '';
$bio        = $user['bio'] ?? '';
$role  = $user['role'] ?? '';

// Fetch services
$stmt_services = $conn->prepare("SELECT title, topic, type FROM Listings WHERE user_id = ?");
$stmt_services->bind_param('i', $user['id']);
$stmt_services->execute();
$user_services = $stmt_services->get_result()->fetch_all(MYSQLI_ASSOC);
$stmt_services->close();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Edit Profile</title>
    <link rel="stylesheet" href="../styles/style.css" />
    <link rel="stylesheet" href="profile_handler/profile.css"/>
</head>
<body>
<header>
    <?php include_header($_SESSION['username'] ?? null); ?>  
</header>

<main class="content">
    <h1>Profile Preview</h1>
    <?php if($message): ?>
        <div class="message"><?= htmlspecialchars($message) ?></div>
    <?php endif; ?>

    <!-- Form with file upload -->
    <form method="POST" enctype="multipart/form-data">
        <!-- Personal Info -->
        <section class="card">
            <div class="profile-fields">
                <div class="user-profile-pic">
                    <h2>Profile Picture</h2>
                    <?php
                     $picPath = "../images/user_pfp/{$user_id}.png";
                     echo '<img src="' . (file_exists($picPath) ? $picPath : '../images/user_pfp/default.png') . '" alt="Profile Picture" class="profile-pic-preview" style="width:180px; height:180px;"> ';
                    ?>
                </div>

                <div class="username">
                    <h2>Username</h2>
                    <input type="text" name="username" placeholder="Username" value="<?= htmlspecialchars($user_name) ?>" readonly>
                </div>

                <div class="user-first-name">
                    <h2>First Name</h2>
                    <input type="text" name="first_name" placeholder="First Name" value="<?= htmlspecialchars($first_name) ?>" readonly>
                </div>

                <div class="user-last-name">
                    <h2>Last Name</h2>
                    <input type="text" name="last_name" placeholder="Last Name" value="<?= htmlspecialchars($last_name) ?>" readonly>
                </div>

                <div class="user-role">
                    <h2>Role</h2>
                    <input type="text" name="role" placeholder="Role" value="<?= htmlspecialchars($role) ?>" readonly>
                </div>

                <div class="user-email">
                    <h2>Email Address</h2>
                    <input type="email" name="email" placeholder="Email Address" value="<?= htmlspecialchars($email) ?>" readonly>
                </div>
            </div>
        </section>

        <!-- Bio -->
        <section class="card">
            <h2>Bio / Requested Skills</h2>
            <textarea name="bio" rows="4" placeholder="Tell us about yourself..."><?= htmlspecialchars($bio) ?></textarea>
        </section>

         <!-- Skills Section -->
        <section class="card">
            <h2>Current Skills</h2>
            <div class="skills-list">
                <?php if (!empty($user_services)): ?>
                    <?php foreach ($user_services as $service): ?>
                        <div class="skill-box">
                            <strong><?= htmlspecialchars($service['title']) ?></strong>
                            <p>Topic: <?= htmlspecialchars($service['topic']) ?></p>
                            <p>Type: <?= htmlspecialchars($service['type']) ?></p>
                        </div>
                    <?php endforeach; ?>
                <?php else: ?>
                    <p>No skills listed yet.</p>
                <?php endif; ?>
            </div>
        </section>

    </form>
</main>
</body>
</html>
