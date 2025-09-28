<?php

require_once '../../inc/dbconn.inc.php';
require_once '../../inc/functions.php';

$input = $_GET['q'] ?? '';

$sql = "SELECT user_name FROM Users WHERE user_name LIKE CONCAT('%', ?, '%');";
$statement = $conn->prepare($sql);
$statement->bind_param('s', $input);
$statement->execute();
$result = $statement->get_result();

$names = [];
while ($row = $result->fetch_assoc()) {
    $names[] = $row;
}

header('Content-Type: application/json');
echo json_encode($names);
