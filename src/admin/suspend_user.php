<?php
//<!-- Authored by Hans Pujalte, FAN PUJA0009 -->
require_once __DIR__ . '/../inc/dbconn.inc.php';

if (!isset($_GET['id'])) {
    header("Location: user_management.php");
    exit;
}

// Fetch user id from query string
$id = intval($_GET['id']);

// Basic sql query to suspend user
$sql = "UPDATE Users SET acc_status = FALSE WHERE id = ?;";
$stmt = $conn->prepare($sql);
$stmt->bind_param('i', $id);
$stmt->execute();
$stmt->close();

header("Location: user_management.php");
exit;
?>
