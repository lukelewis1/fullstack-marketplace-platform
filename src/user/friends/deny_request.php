<!-- Authored by Oliver Wuttke, FAN WUTT0019, Edited by (Oliver Wuttke, FAN WUTT0019) -->

<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

require_once '../../inc/dbconn.inc.php';
require_once '../../inc/functions.php';

$currentUserId = get_uid($_SESSION['username']);
$requesterId   = $_POST['friend_id'] ?? null;

// For denying request we are also just deleting the entry in the friendships DB
$sql = "DELETE FROM Friendships WHERE user_id = ? AND friend_id = ? AND status = 'pending';";
$stmt = $conn->prepare($sql);
$stmt->bind_param('ii', $requesterId, $currentUserId);
$stmt->execute();
$stmt->close();

//Returns a bool so the JS handler can proceed with updating the information correctly on the client side
header('Content-Type: application/json');
echo json_encode(['success' => true]);
