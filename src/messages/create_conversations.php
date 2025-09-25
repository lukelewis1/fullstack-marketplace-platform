<?php
session_start();
require_once '../inc/dbconn.inc.php';

$user = $_SESSION['username'] ?? null;
if(!$user){ http_response_code(401); exit; }

$friend_id = intval($_POST['friend_id'] ?? 0);
if(!$friend_id){ http_response_code(400); exit; }

// Get current user id
$stmt = $conn->prepare("SELECT id FROM Users WHERE user_name=?");
$stmt->bind_param('s',$user);
$stmt->execute();
$stmt->bind_result($uid);
if(!$stmt->fetch()){ http_response_code(403); exit('User not found'); }
$stmt->close();

// 1. check if conversation already exists either way
$sql = "SELECT conversation_id 
        FROM Messages
        WHERE (sender_id=? AND receiver_id=?) 
           OR (sender_id=? AND receiver_id=?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param('iiii', $uid,$friend_id,$friend_id,$uid);
$stmt->execute();
$stmt->bind_result($conv_id);
if($stmt->fetch()){
    echo json_encode(["conversation_id"=>$conv_id, "created"=>false]);
    exit;
}
$stmt->close();

// 2. create new conversation
$stmt = $conn->prepare(
    "INSERT INTO Messages (sender_id, receiver_id, start_date, end_date, unseen)
     VALUES(?, ?, NOW(), NOW(), 0)"
);
$stmt->bind_param('ii',$uid,$friend_id);
$stmt->execute();
$newId = $stmt->insert_id;

echo json_encode(["conversation_id"=>$newId, "created"=>true]);
