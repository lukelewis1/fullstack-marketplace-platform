<?php
session_start();

$bio = $_POST['bio'] ?? '';
$pfp = $_FILES['pfp'] ?? null;

require_once '../inc/dbconn.inc.php';

$sql = 'SELECT id FROM Users WHERE user_name = ?;';
$statement = mysqli_stmt_init($conn);
mysqli_stmt_prepare($statement, $sql);
mysqli_stmt_bind_param($statement, 's', $_SESSION['username']);

if (mysqli_stmt_execute($statement)) {
    $result = mysqli_stmt_get_result($statement);
    $row = $result->fetch_assoc();
    $id = $row['id'];

    $upload_dir = "../images/user_pfp/";
    if (!is_dir($upload_dir)) {
        mkdir($upload_dir, 0777, true);
    }

    $default_file = $upload_dir . "default.jpg";
    $target_file = $upload_dir . $id . ".png";

    if ($pfp && $pfp['error'] === UPLOAD_ERR_OK) {
        $ext = strtolower(pathinfo($pfp['name'], PATHINFO_EXTENSION));
        $allowed = ['jpg', 'jpeg', 'png', 'gif'];

        if (!in_array($ext, $allowed)) {
            echo "Invalid file type.";
            exit;
        }

        if (!move_uploaded_file($pfp['tmp_name'], $target_file)) {
            copy($default_file, $target_file);
        }
    } else {
        copy($default_file, $target_file);
    }
} else {
    echo mysqli_error($conn);
}


$sql = 'UPDATE Users SET bio = ? WHERE user_name = ?';

$statement = mysqli_stmt_init($conn);
mysqli_stmt_prepare($statement, $sql);
mysqli_stmt_bind_param($statement, 'ss', $bio, $_SESSION['username']);

if (!mysqli_stmt_execute($statement)) {
    echo mysqli_error($conn);
}

mysqli_close($conn);

?>

<!DOCTYPE html>
<html lang="en" >
<head>
    <meta charset="UTF-8">
    <title>FUSS</title>
    <link rel="stylesheet" href="loader_style.css">
    <link rel="icon" href="../images/site/flinderslogo.png">

    <script>
        document.addEventListener("DOMContentLoaded", () => {
            setTimeout(() => {
                window.location.href = "../user/user-homepage.php";
            }, 4500);
        });
    </script>

</head>
<body>

<div id="msg">
    Submitting Extension Requests
</div>

<svg class="pl" viewBox="0 0 128 128" width="128px" height="128px" xmlns="http://www.w3.org/2000/svg">
    <defs>
        <linearGradient id="pl-grad" x1="0" y1="0" x2="0" y2="1">
            <stop offset="0%" stop-color="#FFCC00" />
            <stop offset="100%" stop-color="#FFD633" />
        </linearGradient>
    </defs>
    <circle class="pl__ring" r="56" cx="64" cy="64" fill="none" stroke="hsla(0,10%,10%,0.1)" stroke-width="16" stroke-linecap="round" />
    <path class="pl__worm" d="M92,15.492S78.194,4.967,66.743,16.887c-17.231,17.938-28.26,96.974-28.26,96.974L119.85,59.892l-99-31.588,57.528,89.832L97.8,19.349,13.636,88.51l89.012,16.015S81.908,38.332,66.1,22.337C50.114,6.156,36,15.492,36,15.492a56,56,0,1,0,56,0Z" fill="none" stroke="url(#pl-grad)" stroke-width="16" stroke-linecap="round" stroke-linejoin="round" stroke-dasharray="44 1111" stroke-dashoffset="10" />
</svg>

<script>
    function randomInt(min, max) {
        return Math.floor(Math.random() * (max - min + 1)) + min;
    }

    let dynamicMsg = document.getElementById('msg');

    messages = [
        'Submitting Extension Requests',
        'Skipping Lectures',
        'Watching Lecture Recordings on 2x speed',
        'Asking ChatGPT for Help',
        'Complaining about Group Assignments',
        'Doom Scrolling TikTok...',
        'LinkedIn?',
        'Praying for the Jane Street Internship'
    ]

    setInterval(() => {
        const idx = randomInt(0, messages.length - 1);
        dynamicMsg.textContent = messages[idx];
    }, 1500);

</script>

</body>
</html>

