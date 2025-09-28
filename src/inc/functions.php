<?php

// Include the appropriate header based on user role

function include_header($username) {
    global $conn;

    if (!$username) {
        include 'user_header.php';
        return;
    }

    $sql = "SELECT is_admin FROM Users WHERE user_name = ?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, 's', $username);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $row = mysqli_fetch_assoc($result);
    mysqli_stmt_close($stmt);

    include ($row && (int)$row['is_admin'] === 1)
        ? 'admin_header.php'
        : 'user_header.php';
}

// Function to get profile image path using username
function get_profile_image($username) {
    global $conn;

    if ($username) {
        $sql = "SELECT id FROM Users WHERE user_name = ?";
        $stmt = mysqli_prepare($conn, $sql);
        mysqli_stmt_bind_param($stmt, 's', $username);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_bind_result($stmt, $id);
        mysqli_stmt_fetch($stmt);
        mysqli_stmt_close($stmt);

        if (!empty($id)) {
            $img = "../images/user_pfp/{$id}.png"; // Handle different file types
        }
    }
    return $img;
}

// Function to get user role using userid
function get_role($userid){
    global $conn;

    if ($userid) {
        $sql = "SELECT role FROM Users WHERE user_name = ?";
        $stmt = mysqli_prepare($conn, $sql);
        mysqli_stmt_bind_param($stmt, 's', $userid);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_bind_result($stmt, $role);
        mysqli_stmt_fetch($stmt);
        mysqli_stmt_close($stmt);
        return $role ?? 'Student'; // fallback if role is null
    } else {
        return 'Student';
    }

}

// Function which returns the user_id for a given username
function get_uid($username) {
    global $conn;

    $sql = 'SELECT id FROM Users WHERE user_name = ?;';
    $statement = $conn->prepare($sql);
    $statement->bind_param('s', $username);
    $statement->execute();
    $statement->bind_result($uid);
    $statement->fetch();
    $statement->close();

    return $uid;
}

// Function which takes a user_id and listing title and returns a listing id
function get_lid($uid, $title) {
    global $conn;

    $sql = 'SELECT listing_id FROM Listings WHERE user_id = ? AND title = ?;';
    $statement = $conn->prepare($sql);
    $statement->bind_param('is', $uid, $title);
    $statement->execute();
    $statement->bind_result($lid);
    $statement->fetch();
    $statement->close();

    return $lid;
}

//Function to get a username from a id
function get_username($uid) {
    global $conn;

    $sql = 'SELECT user_name FROM Users WHERE id = ?;';
    $statement = $conn->prepare($sql);
    $statement->bind_param('i', $uid);
    $statement->execute();
    $statement->bind_result($username);
    $statement->fetch();
    $statement->close();

    return $username;
}

{

}
?>
