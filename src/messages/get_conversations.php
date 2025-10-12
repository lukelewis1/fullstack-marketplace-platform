<?php
//<!-- Authored by Oliver Wuttke, FAN WUTT0019, Edited by (Oliver Wuttke, FAN WUTT0019) -->
session_start();
require_once '../inc/dbconn.inc.php';

$user = $_SESSION['username'] ?? null;
if(!$user){ http_response_code(401); exit; }

// get current user id
$stmt = $conn->prepare("SELECT id FROM Users WHERE user_name=?");
$stmt->bind_param('s',$user);
$stmt->execute();
$stmt->bind_result($uid);
if(!$stmt->fetch()){ http_response_code(403); exit('User not found'); }
$stmt->close();

// returns a list of conversations with each conversation being a new row with the other persons username,
// timestamp of most recent message and the unseen status of the message
$sql = "
SELECT m.conversation_id,
       CASE WHEN m.sender_id = ? THEN u2.user_name ELSE u1.user_name END AS other_name,
       COALESCE(MAX(cm.sent_at), m.start_date) AS last_message_time,
       CASE 
            WHEN m.receiver_id = ? THEN m.unseen 
            ELSE m.unseen_2
       END AS unseen
FROM Messages m
JOIN Users u1 ON u1.id = m.sender_id
JOIN Users u2 ON u2.id = m.receiver_id
LEFT JOIN ChatMessages cm ON cm.conversation_id = m.conversation_id
WHERE m.sender_id = ? OR m.receiver_id = ?
GROUP BY m.conversation_id, other_name, m.start_date, m.unseen, m.unseen_2
ORDER BY last_message_time DESC;";
/*
 * AI Tool used
 * Line Number: in AI-Acknowledgements
 * AI was used to help craft this query I gave it the current schema of our database and needed a query that returns all conversations for a given user,
 * also needed to determine the unseen status of the message so CSS elements controlled by JS could dynamically show users what messages they have and haven't seen
 * the complexity of this query does come down to suboptimal database architecture but it does work
 */

$stmt = $conn->prepare($sql);
$stmt->bind_param('iiii', $uid, $uid, $uid, $uid);

$stmt->execute();
$res = $stmt->get_result();

// returns the conversations in json format so they can be populated as list items in msg_script.js
$convs = [];
while($row = $res->fetch_assoc()) $convs[] = $row;

header('Content-Type: application/json');
echo json_encode($convs);
