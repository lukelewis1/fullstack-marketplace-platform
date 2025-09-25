<?php
session_start();
require_once '../inc/dbconn.inc.php';

$user = $_SESSION['username'] ?? null;
if(!$user){ http_response_code(401); exit; }

// get current user id safely
$stmt = $conn->prepare("SELECT id FROM Users WHERE user_name=?");
$stmt->bind_param('s',$user);
$stmt->execute();
$stmt->bind_result($uid);
if(!$stmt->fetch()){ http_response_code(403); exit('User not found'); }
$stmt->close();

$sql = "
SELECT m.conversation_id,
       CASE WHEN m.sender_id = ? THEN u2.user_name ELSE u1.user_name END AS other_name,
       COALESCE(MAX(cm.sent_at), m.start_date) AS last_message_time
FROM Messages m
JOIN Users u1 ON u1.id = m.sender_id
JOIN Users u2 ON u2.id = m.receiver_id
LEFT JOIN ChatMessages cm ON cm.conversation_id = m.conversation_id
WHERE m.sender_id = ? OR m.receiver_id = ?
GROUP BY m.conversation_id, other_name, m.start_date
ORDER BY last_message_time DESC";



$stmt = $conn->prepare($sql);
$stmt->bind_param('iii', $uid, $uid, $uid);
$stmt->execute();
$res = $stmt->get_result();

$convs = [];
while($row = $res->fetch_assoc()) $convs[] = $row;

header('Content-Type: application/json');
echo json_encode($convs);
