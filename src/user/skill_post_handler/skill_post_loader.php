<?php

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

$currentPage = basename($_SERVER['PHP_SELF']);

require_once '../../inc/dbconn.inc.php';

$uid = $_SESSION['username'];
$name = $_POST['skill-name'];
$topic = $_POST['topic-name'];
$category = $_POST['category-name'];
$description = $_POST['description'];
$price = $_POST['price-name'];
$negotiable = $_POST['negotiable'];

