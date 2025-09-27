<?php

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

$currentPage = basename($_SERVER['PHP_SELF']);

require_once '../../inc/dbconn.inc.php';
require_once '../../inc/functions.php';

// Listing insertion into the database

$username = $_SESSION['username'];
$name = $_POST['skill-name'];
$topic = $_POST['topic-name'];
$category = $_POST['category-name'];
$description = $_POST['description'];
$price = $_POST['price-name'];
$negotiable = $_POST['negotiable'];
$uid = get_uid($username);
$successful_transactions = 0;

$sql = 'INSERT INTO Listings 
        (user_id, price, title, topic, description, successful_exchanges, is_negotiable, type) 
        VALUES (?, ?, ?, ?, ?, ?, ?, ?);';

$statement = $conn->prepare($sql);
$statement->bind_param('iisssiis', $uid, $price, $name, $topic, $description, $successful_transactions, $negotiable, $category);
$statement->execute();
$statement->close();

// Scheduling/Availability insertion into the database

$service_id = get_lid($uid, $name);

$days = [
    'monday'    => [$_POST['monday_start'] ?? [], $_POST['monday_end'] ?? []],
    'tuesday'   => [$_POST['tuesday_start'] ?? [], $_POST['tuesday_end'] ?? []],
    'wednesday' => [$_POST['wednesday_start'] ?? [], $_POST['wednesday_end'] ?? []],
    'thursday'  => [$_POST['thursday_start'] ?? [], $_POST['thursday_end'] ?? []],
    'friday'    => [$_POST['friday_start'] ?? [], $_POST['friday_end'] ?? []],
    'saturday'  => [$_POST['saturday_start'] ?? [], $_POST['saturday_end'] ?? []],
    'sunday'    => [$_POST['sunday_start'] ?? [], $_POST['sunday_end'] ?? []],
];

foreach ($days as $dayName => [$startsRaw, $endsRaw]) {
    // filter out empty start values
    $starts = array_filter($startsRaw, fn($v) => trim((string)$v) !== '');

    if (count($starts) > 0) {
        foreach ($starts as $i => $startTime) {
            $endTime = $endsRaw[$i] ?? '';

            $sql = 'INSERT INTO Availability(service_id, day, start, end) 
                VALUES (?, ?, ?, ?);';

            $statement = $conn->prepare($sql);
            $statement->bind_param('isss', $service_id, $dayName, $startTime, $endTime);
            $statement->execute();
            $statement->close();
        }
    }
}


