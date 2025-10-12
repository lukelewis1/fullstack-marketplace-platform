<?php
//<!-- Authored by Oliver Wuttke, FAN WUTT0019, Edited by (Oliver Wuttke, FAN WUTT0019) -->
require_once '../inc/dbconn.inc.php';

header('Content-Type: application/json');

$user = $_POST['username'] ?? '';
$email = $_POST['email'] ?? '';

$response = ['valid' => true, 'errors' => []];

// Validates the username and email before full sign up form is available to a user
if ($user === '') {
    $response['valid'] = false;
    $response['errors']['username'] = "Username is required.";
}

if (!filter_var($email, FILTER_VALIDATE_EMAIL) || !str_ends_with($email, '@flinders.edu.au')) {
    $response['valid'] = false;
    $response['errors']['email'] = "Invalid Flinders email address.";
}

// Checks if the username or email are already in use
if ($response['valid']) {
    $sql = 'SELECT user_name, email FROM Users WHERE user_name = ? OR email = ?;';
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, 'ss', $user, $email);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    while ($row = $result->fetch_assoc()) {
        if ($row['user_name'] === $user) {
            $response['valid'] = false;
            $response['errors']['username'] = "Username already taken.";
        }
        if ($row['email'] === $email) {
            $response['valid'] = false;
            $response['errors']['email'] = "Email already in use.";
        }
    }
}

echo json_encode($response);