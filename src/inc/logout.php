<?php

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

$_SESSION = [];
session_unset();
session_destroy();

$redirect_page = '/index.php';
exit;

include __DIR__ . '/inc/loader.html';


