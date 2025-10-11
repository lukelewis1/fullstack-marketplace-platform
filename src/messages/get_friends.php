<!-- Authored by Oliver Wuttke, FAN WUTT0019, Edited by (Oliver Wuttke, FAN WUTT0019) -->

<?php
session_start();
require_once '../inc/dbconn.inc.php';

$user = $_SESSION['username'] ?? null;
if(!$user){ http_response_code(401); exit; }

// get user id
$stmt = $conn->prepare("SELECT id FROM Users WHERE user_name=?");
$stmt->bind_param('s',$user);
$stmt->execute();
$stmt->bind_result($uid);
if(!$stmt->fetch()){ http_response_code(403); exit('User not found'); }
$stmt->close();

// get friends of the user
$sql = "
SELECT u.id, u.user_name
FROM Friendships f
JOIN Users u ON u.id = f.friend_id
WHERE f.user_id=? AND f.status='accepted'
UNION
SELECT u.id, u.user_name
FROM Friendships f
JOIN Users u ON u.id = f.user_id
WHERE f.friend_id=? AND f.status='accepted';";

$stmt = $conn->prepare($sql);
$stmt->bind_param('ii',$uid,$uid);
$stmt->execute();
$res = $stmt->get_result();

// makes a list and puts the friends in it then puts them in json so that msg_script.js can add them to the drop down menu for starting a new conversation
$friends = [];
while($r = $res->fetch_assoc()) $friends[] = $r;

header('Content-Type: application/json');
echo json_encode($friends);

