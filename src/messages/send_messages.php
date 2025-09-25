<?php
session_start();
require_once '../inc/dbconn.inc.php';

$user = $_SESSION['username'] ?? null;
if(!$user){ http_response_code(401); exit; }

$text = trim($_POST['text'] ?? '');
$conv = intval($_POST['conversation_id'] ?? 0);

if(!$text || !$conv){ http_response_code(400); exit; }

// find current user ID
$stmt = $conn->prepare("SELECT id FROM Users WHERE user_name=?");
$stmt->bind_param('s',$user);
$stmt->execute();
$stmt->bind_result($uid);
$stmt->fetch();
$stmt->close();

// insert message
$stmt = $conn->prepare("
    INSERT INTO ChatMessages (conversation_id, sender_id, message_text, sent_at)
    VALUES (?, ?, ?, NOW())");
$stmt->bind_param('iis', $conv, $uid, $text);
$stmt->execute();

echo json_encode(["ok"=>true]);
