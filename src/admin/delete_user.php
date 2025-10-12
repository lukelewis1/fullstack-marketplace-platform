<?php
//<!-- Authored by Hans Pujalte, FAN PUJA0009 -->
require_once __DIR__ . '/../inc/dbconn.inc.php';

if (!isset($_GET['id'])) {
    header("Location: user_management.php");
    exit;
}

# Fetch user id from query string
$id = intval($_GET['id']);

# Basic sql query to delete user
$sql = "DELETE FROM Users WHERE id = ?";
$stmt = mysqli_prepare($conn, $sql);
mysqli_stmt_bind_param($stmt, 'i', $id);
mysqli_stmt_execute($stmt);

mysqli_stmt_close($stmt);
mysqli_close($conn);

// Refresh back to user management page
header("Location: user_management.php");
exit;
?>
