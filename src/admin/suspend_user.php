<?php
require_once __DIR__ . '/../inc/dbconn.inc.php';

if (!isset($_GET['id'])) {
    header("Location: user_management.php");
    exit;
}

$id = intval($_GET['id']);

$sql = "UPDATE Users SET acc_status = FALSE WHERE id = ?;";
$stmt = $conn->prepare($sql);
$stmt->bind_param('i', $id);
$stmt->execute();
$stmt->close();

header("Location: user_management.php");
exit;
?>
