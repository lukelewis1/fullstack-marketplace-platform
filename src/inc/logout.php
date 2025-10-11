<?php
//<!-- Authored by Oliver Wuttke, FAN WUTT0019, Edited by (Oliver Wuttke, FAN WUTT0019) -->

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

$redirect_page = '/index.php';
include __DIR__ . '/loader.html';

$_SESSION = [];
session_unset();
session_destroy();


exit;




