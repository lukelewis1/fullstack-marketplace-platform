<?php
    if (session_status() === PHP_SESSION_NONE) {
      session_start();
    }

    require_once __DIR__ . '/../inc/dbconn.inc.php';
    require_once __DIR__ . '/../inc/functions.php';

    $sql = 'SELECT fuss_credit FROM Users WHERE user_name = ?;';
    $statement = $conn->prepare($sql);
    $statement->bind_param('s', $_SESSION['username']);
    $statement->execute();

    $result = $statement->get_result();
    $row = $result->fetch_assoc();
    $credit_balance = isset($row['fuss_credit']) ? $row['fuss_credit'] : 0;
    $statement->close();
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
    <header>
      <?php
        include_header($_SESSION['username'] ?? null);
      ?>  

</header>
    
    
    <!-- Main Content -->
     

    <main class="content">
      <h1> View Profile </h1>
    </main>

    <script src="../scripts/global_scripts.js"></script>
  </body>
</html>
