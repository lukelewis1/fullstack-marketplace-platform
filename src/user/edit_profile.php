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

// Handle POST submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Sanitize inputs
    $first_name  = htmlspecialchars($_POST['first_name'] ?? '');
    $last_name   = htmlspecialchars($_POST['last_name'] ?? '');
    $degree_type = htmlspecialchars($_POST['degree_type'] ?? '');
    $degree      = htmlspecialchars($_POST['degree'] ?? '');
    $email       = htmlspecialchars($_POST['email'] ?? '');
    $bio         = htmlspecialchars($_POST['bio'] ?? '');
    $role = htmlspecialchars($_POST['role'] ?? '');

    // Update user details
    $stmt = $conn->prepare("UPDATE Users SET f_name=?, l_name=?, email=?, bio=?, role=? WHERE user_name=?");
    $stmt->bind_param('ssssss', $first_name, $last_name, $email, $bio, $role, $user_name);
    $message = $stmt->execute() ? "Changes Saved Successfully!" : "Error: " . $stmt->error;
    $stmt->close();

    // Handle profile picture upload
if (!empty($_FILES['profile_pic']['name']) && !empty($user_id)) {
    $upload_dir = __DIR__ . '/../images/user_pfp/'; // ensure correct path

    // Create directory if it doesn't exist
    if (!is_dir($upload_dir)) {
        mkdir($upload_dir, 0755, true);
    }

    $tmp_name = $_FILES['profile_pic']['tmp_name'];
    $original_name = $_FILES['profile_pic']['name'];
    $file_ext = strtolower(pathinfo($original_name, PATHINFO_EXTENSION));
    $allowed = ['png','jpg','jpeg','gif'];

    if (in_array($file_ext, $allowed)) {
        // Target file path (always PNG for consistency)
        $target_file = $upload_dir . $user_id . '.png';

        // Move uploaded file to target location
        if (move_uploaded_file($tmp_name, $target_file)) {
            $message = "Profile picture updated successfully!";
            header("Location: " . $_SERVER['REQUEST_URI']); // refresh page to show new image
        } else {
            $message = "Failed to upload profile picture. Please try again.";
        }
    }   

}
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Edit Profile</title>
    <link rel="stylesheet" href="../styles/style.css" />
    <link rel="stylesheet" href="../user/profile.css"/>
</head>
<body>
<header>
    <?php include_header($_SESSION['username'] ?? null); ?>  
</header>

<main class="content">
    <h1>Profile Customisation</h1>
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
                     echo '<img src="' . (file_exists($picPath) ? $picPath : '../images/user_pfp/default.png') . '" alt="Profile Picture" class="profile-pic-preview">';
                    ?>
                    <input type="file" name="profile_pic" accept="image/*">
                </div>

                <div class="username">
                    <h2>Username</h2>
                    <input type="text" name="username" placeholder="Username" value="<?= htmlspecialchars($user_name) ?>">
                </div>

                <div class="user-first-name">
                    <h2>First Name</h2>
                    <input type="text" name="first_name" placeholder="First Name" value="<?= htmlspecialchars($first_name) ?>">
                </div>

                <div class="user-last-name">
                    <h2>Last Name</h2>
                    <input type="text" name="last_name" placeholder="Last Name" value="<?= htmlspecialchars($last_name) ?>">
                </div>

                <div class="user-role">
                    <h2>Role</h2>
                    <input type="text" name="role" placeholder="Role" value="<?= htmlspecialchars($role) ?>">
                </div>

                <div class="user-email">
                    <h2>Email Address</h2>
                    <input type="email" name="email" placeholder="Email Address" value="<?= htmlspecialchars($email) ?>">
                </div>
            </div>
        </section>

        <!-- Bio -->
        <section class="card">
            <h2>Bio</h2>
            <textarea name="bio" rows="4" placeholder="Tell us about yourself..."><?= htmlspecialchars($bio) ?></textarea>
        </section>

         <!-- Bio -->
        <section class="card">
            <h2>Skills</h2>
            <!-- <textarea name="bio" rows="4" placeholder="Tell us about yourself..."><?= htmlspecialchars($bio) ?></textarea> -->
        </section>

        <div class="save-row">
            <button type="submit" class="save-btn">Save Changes</button>
        </div>
    </form>
</main>
</body>
</html>
