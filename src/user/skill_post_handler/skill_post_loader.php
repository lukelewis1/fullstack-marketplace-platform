<?php

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

$currentPage = basename($_SERVER['PHP_SELF']);

require_once '../../inc/dbconn.inc.php';
require_once '../../inc/functions.php';

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




