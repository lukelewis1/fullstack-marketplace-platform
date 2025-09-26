<?php
    if (session_status() === PHP_SESSION_NONE) {
      session_start();
    }

    $currentPage = basename($_SERVER['PHP_SELF']);
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>User Home Page</title>
    <link rel="stylesheet" href="../styles/style.css" />
  </head>
  <body>
    <?php 
     

     require_once '../inc/dbconn.inc.php';
     $sql = 'SELECT is_admin FROM Users WHERE user_name = ?;';

    $statement = mysqli_stmt_init($conn);
    mysqli_stmt_prepare($statement, $sql);
    mysqli_stmt_bind_param($statement, 's', $_SESSION['username']);

    if (mysqli_stmt_execute($statement)) {
        $result = mysqli_stmt_get_result($statement);
        $row = $result->fetch_assoc();
        if ($row) {
            if ($row['is_admin'] === 1) {
                include('../inc/admin-header.php');
            } else {
                include('../inc/user-header.php');
            }
        }
    } else {
        echo mysqli_error($conn);
    }
     ?>

    <div class="page-wrapper">


    <main class="content">
      <h1>Skill Request</h1>
    </main>
  </div>

    <script src="../scripts/global_scripts.js"></script>
    <script src="../scripts/script.js"></script>
  </body>
</html>
