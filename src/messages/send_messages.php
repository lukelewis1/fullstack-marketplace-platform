<?php
session_start();
require_once '../inc/dbconn.inc.php';

$user = $_SESSION['username'] ?? null;
if (!$user) { http_response_code(401); exit; }

// grabs the text parsed by msg_script.js and the conversation id
$text = trim($_POST['text'] ?? '');
$conv = intval($_POST['conversation_id'] ?? 0);
if (!$text || !$conv) { http_response_code(400); exit; }

// get current user id
$stmt = $conn->prepare("SELECT id FROM Users WHERE user_name=?");
$stmt->bind_param('s',$user);
$stmt->execute();
$stmt->bind_result($uid);
$stmt->fetch();
$stmt->close();

// insert the new message into the table
$stmt = $conn->prepare("
    INSERT INTO ChatMessages (conversation_id, sender_id, message_text, sent_at)
    VALUES (?, ?, ?, NOW())
");
$stmt->bind_param('iis', $conv, $uid, $text);
$stmt->execute();
$stmt->close();

// get the sender and receiver for the conversation
$stmt = $conn->prepare("SELECT sender_id, receiver_id FROM Messages WHERE conversation_id=?");
$stmt->bind_param('i',$conv);
$stmt->execute();
$stmt->bind_result($s,$r);
$stmt->fetch();
$stmt->close();

// opposite of mark_seen.php logic for setting the unseen to true when messages are sent
if ($uid == $s) {
    // logged in user is sender set unseen for receiver
    $stmt = $conn->prepare("UPDATE Messages SET unseen=1 WHERE conversation_id=?");
    $stmt->bind_param('i',$conv);
} else {
    // logged in user is receiver set unseen for sender
    $stmt = $conn->prepare("UPDATE Messages SET unseen_2=1 WHERE conversation_id=?");
    $stmt->bind_param('i',$conv);
}
$stmt->execute();
$stmt->close();

echo json_encode(["ok"=>true]);
