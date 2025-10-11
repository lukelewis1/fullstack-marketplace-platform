<!-- Authored by Oliver Wuttke, FAN WUTT0019, Edited by (Oliver Wuttke, FAN WUTT0019) -->

<?php
session_start();
require_once '../inc/dbconn.inc.php';

$user = $_SESSION['username'] ?? null;
if(!$user){ http_response_code(401); exit; }

$conv = intval($_POST['conversation_id'] ?? 0);
if(!$conv){ http_response_code(400); exit; }

// get user id
$statement = $conn->prepare("SELECT id FROM Users WHERE user_name=?");
$statement->bind_param('s',$user);
$statement->execute();
$statement->bind_result($uid);
$statement->fetch();
$statement->close();

// gets sender and receiver for the current conversation
$statement = $conn->prepare("SELECT sender_id, receiver_id FROM Messages WHERE conversation_id=?");
$statement->bind_param('i',$conv);
$statement->execute();
$statement->bind_result($s,$r);
$statement->fetch();
$statement->close();


// if current user is the sender we clear the sender side of unseen
// if not then current user is the receiver and we clear their side of unseen
// this makes sure that unseen/seen works both ways
if ($uid == $s) {
    $statement = $conn->prepare("UPDATE Messages SET unseen_2=0 WHERE conversation_id=?");
    $statement->bind_param('i',$conv);
} else {
    $statement = $conn->prepare("UPDATE Messages SET unseen=0 WHERE conversation_id=?");
    $statement->bind_param('i',$conv);
}
$statement->execute();
$statement->close();

echo json_encode(["ok"=>true]);
