<?php
session_start();
require_once '../inc/dbconn.inc.php';

$user = $_SESSION['username'] ?? null;
if(!$user){ http_response_code(401); exit; }

$conv = intval($_POST['conversation_id'] ?? 0);
if(!$conv){ http_response_code(400); exit; }

// get current user id
$stmt = $conn->prepare("SELECT id FROM Users WHERE user_name=?");
$stmt->bind_param('s',$user);
$stmt->execute();
$stmt->bind_result($uid);
$stmt->fetch();
$stmt->close();

// know who is who
$stmt = $conn->prepare("SELECT sender_id, receiver_id FROM Messages WHERE conversation_id=?");
$stmt->bind_param('i',$conv);
$stmt->execute();
$stmt->bind_result($s,$r);
$stmt->fetch();
$stmt->close();

if ($uid == $s) {
    $stmt = $conn->prepare("UPDATE Messages SET unseen_2=0 WHERE conversation_id=?");
    $stmt->bind_param('i',$conv);
} else {
    $stmt = $conn->prepare("UPDATE Messages SET unseen=0 WHERE conversation_id=?");
    $stmt->bind_param('i',$conv);
}
$stmt->execute();
$stmt->close();

echo json_encode(["ok"=>true]);
