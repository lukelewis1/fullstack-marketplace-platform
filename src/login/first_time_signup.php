<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: index.php");
    exit;
}

require_once '../inc/dbconn.inc.php';

$sql = 'SELECT * FROM Users WHERE user_name = ?;';

$statement = mysqli_stmt_init($conn);
mysqli_stmt_prepare($statement, $sql);
mysqli_stmt_bind_param($statement, 's', $_SESSION['username']);

if (mysqli_stmt_execute($statement)) {
    $result = mysqli_stmt_get_result($statement);
    $row = $result->fetch_assoc();

    $username = $row['user_name'];
    $email = $row['email'];
    $fname = $row['f_name'];
    $lname = $row['l_name'];
    $dob = $row['dob'];
    $role = $row['role'];

} else {
    echo mysqli_error($conn);
}

mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FUSS</title>
    <link rel="icon" href="../images/site/flinderslogo.png">
    <link rel="stylesheet" href="signup_style.css">
</head>
<body>

</body>
</html>
