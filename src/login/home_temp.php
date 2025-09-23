<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: index.php"); // not logged in
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

    echo $row['user_name'] . "<br>";
    echo $row['email'] . "<br>";
    echo $row['f_name'] . "<br>";
    echo $row['l_name'] . "<br>";
    echo $row['dob'] . "<br>";
    echo $row['role'] . "<br>";

} else {
    echo mysqli_error($conn);
}

mysqli_close($conn);

