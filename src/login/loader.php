<?php
//<!-- Authored by Oliver Wuttke, FAN WUTT0019, Edited by (Oliver Wuttke, FAN WUTT0019) -->
$user = $_POST['username_log'] ?? null;
$password = $_POST['password_log'] ?? null;
$hashed_password = hash('sha256', $password);
$name_good = false;
$password_good = false;
$admin = false;
$status = true;

require_once '../inc/dbconn.inc.php';

$sql = 'SELECT user_name, hashed_password, bio, is_admin, acc_status FROM Users WHERE user_name = ? AND hashed_password = ?;';

$statement = mysqli_stmt_init($conn);
mysqli_stmt_prepare($statement, $sql);
mysqli_stmt_bind_param($statement, 'ss', $user, $hashed_password);

if (mysqli_stmt_execute($statement)) {
    $result = mysqli_stmt_get_result($statement);
    $row = $result->fetch_assoc();

    if ($row) {
        $bio = $row['bio'];
        if ($row && $row['user_name'] === $user) {
            $name_good = true;
        }
        if ($row && $row['hashed_password'] === $hashed_password) {
            $password_good = true;
        }
        if ($row['is_admin'] === 1) {
            $admin = true;
        }
        if ($row['acc_status'] === 0) {
            $status = false;
        }
    }
} else {
    echo mysqli_error($conn);
}

if ($name_good && $password_good && $status) {
    $redirect_page = '../user/user_homepage.php';
    session_start();
    $_SESSION['username'] = $user;
    if ($bio === null) {
        $redirect_page = 'first_time_signup.php';
    }
    if ($admin) {
        $redirect_page = '../admin/admin_homepage.php';
    }
} else if (!$name_good || !$password_good || !$status) {
    $redirect_page = '../index.php';
}

mysqli_close($conn);

include __DIR__ . '/../inc/loader.html';


