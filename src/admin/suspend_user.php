<?php
require_once __DIR__ . '/../inc/dbconn.inc.php';

if (!isset($_GET['id'])) {
    header("Location: user_management.php");
    exit;
}

$id = intval($_GET['id']);

?>
