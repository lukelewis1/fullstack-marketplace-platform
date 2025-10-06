<?php
require_once __DIR__ . '/../inc/dbconn.inc.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $f_name = $_POST['f_name'];
    $l_name = $_POST['l_name'];
    $email = $_POST['email'];
    $role = $_POST['role'];
    $credits = $_POST['credits'];

    $sql = "UPDATE Users SET f_name = ?, l_name = ?, email = ?, role = ?, fuss_credit = ? WHERE id = ?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "ssssii", $f_name, $l_name, $email, $role, $credits, $id);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    mysqli_close($conn);

    echo "Success";
}
?>
