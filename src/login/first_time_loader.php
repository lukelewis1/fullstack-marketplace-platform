<?php
//<!-- Authored by Oliver Wuttke, FAN WUTT0019, Edited by (Oliver Wuttke, FAN WUTT0019) -->
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

$redirect_page = '../user/user_homepage.php';

mysqli_close($conn);

include __DIR__ . '/../inc/loader.html';



