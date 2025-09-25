<?php
session_start();
require_once '../inc/dbconn.inc.php';

$user = $_SESSION['username'] ?? null;
if(!$user){ http_response_code(401); exit; }

// find uid
$stmt = $conn->prepare("SELECT id FROM Users WHERE user_name=?");
$stmt->bind_param('s',$user);
$stmt->execute();
$stmt->bind_result($uid);
if(!$stmt->fetch()){ http_response_code(403); exit('User not found'); }
$stmt->close();

// friends where current user is user_id
$sql = "
SELECT u.id, u.user_name
FROM Friendships f
JOIN Users u ON u.id = f.friend_id
WHERE f.user_id=? AND f.status='accepted'
UNION
SELECT u.id, u.user_name
FROM Friendships f
JOIN Users u ON u.id = f.user_id
WHERE f.friend_id=? AND f.status='accepted'
";
$stmt = $conn->prepare($sql);
$stmt->bind_param('ii',$uid,$uid);
$stmt->execute();
$res = $stmt->get_result();

$friends = [];
while($r = $res->fetch_assoc()) $friends[] = $r;

header('Content-Type: application/json');
echo json_encode($friends);

