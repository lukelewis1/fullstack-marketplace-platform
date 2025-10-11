<!-- Authored by Oliver Wuttke, FAN WUTT0019, Edited by (Oliver Wuttke, FAN WUTT0019) -->

<?php
session_start();
require_once '../inc/dbconn.inc.php';

$conv = $_GET['conversation_id'] ?? null;
if(!$conv){ http_response_code(400); exit; }

// gets the messages for a given conversation
$sql = "
SELECT cm.msg_id, cm.sender_id, u.user_name, cm.message_text, cm.sent_at
FROM ChatMessages cm
JOIN Users u ON u.id = cm.sender_id
WHERE cm.conversation_id = ?
ORDER BY cm.sent_at ASC";

$stmt = $conn->prepare($sql);
$stmt->bind_param('i', $conv);
$stmt->execute();
$res = $stmt->get_result();

// puts all messages in a list then into json to be inserted as divs in msg_style.js
$msgs = [];
while ($r = $res->fetch_assoc()) {
    $msgs[] = $r;
}

header('Content-Type: application/json');
echo json_encode($msgs);

