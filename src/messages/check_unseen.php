<?php
//<!-- Authored by Oliver Wuttke, FAN WUTT0019, Edited by (Oliver Wuttke, FAN WUTT0019) -->
session_start();
require_once '../inc/dbconn.inc.php';

$user = $_SESSION['username'] ?? null;
if (!$user) {echo json_encode(['unseen'=>false]); exit;}

$stmt = $conn->prepare("SELECT id FROM Users WHERE user_name=?");
$stmt->bind_param('s', $user);
$stmt->execute();
$stmt->bind_result($uid);
$stmt->fetch();
$stmt->close();

// gets a count of all messages where the receiver is the user and also unseen
$sql = "SELECT COUNT(*) AS c FROM Messages WHERE receiver_id=? AND unseen=1";

$statement = $conn->prepare($sql);
$statement->bind_param('i', $uid);
$statement->execute();
$statement->bind_result($count);
$statement->fetch();

echo json_encode(['unseen' => ($count ?? 0) > 0]);
$statement->close();