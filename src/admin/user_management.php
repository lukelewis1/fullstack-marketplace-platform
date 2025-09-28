<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if (!isset($_SESSION['username'])) {
    header("Location: ../index.php");
    exit;
}

require_once __DIR__ . '/../inc/dbconn.inc.php';
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>User Home Page</title>
    <link rel="stylesheet" href="../styles/style.css" />
    <link rel="stylesheet" href="../styles/user_management.css" />
  </head>
  <body>

    <?php 
     include('../inc/admin_header.php');
    ?>
  
    <div class="page-wrapper">

    <!-- Main Content -->
     <main class="content">
  
      <search> 
      <div class="search-bar admin-search-bar">
        <form action="#" method="get">
          <input
          type="search"
          id="search-input"
          name="q"
          placeholder="Search"
                  />
        </form>
      </div>
     
     </search>
      

      <div class="table-wrapper">
        <table>
          <thead>
            <tr>
              <th>Student ID</th>
              <th>First Name</th>
              <th>Last Name</th>
              <th>Email Address</th>
              <th>Role</th>
              <th>Status</th>
              <th>
                <div class="dropdown admin-filter-dropdown action-dropdown">
                  <button>Action</button>
                  <div class="dropdown-content">
                    <a> View </a>
                    <a> Edit </a>
                    <a> Delete </a>
                  </div>
              </div> </th> <!-- Empty header for checkbox -->
            </tr>
          </thead>
          <tbody>
            <tr>
              <?php

                $sql = "SELECT id, f_name, l_name, email, role FROM Users;";
                $stmt = mysqli_prepare($conn, $sql);
                mysqli_stmt_execute($stmt);
                $result = mysqli_stmt_get_result($stmt);
                if (mysqli_num_rows($result) > 0) {
                  while ($row = mysqli_fetch_assoc($result)) {
                  echo "<tr>";
                  echo "<td>" . htmlspecialchars($row['id']) . "</td>";
                  echo "<td>" . htmlspecialchars($row['f_name']) . "</td>";
                  echo "<td>" . htmlspecialchars($row['l_name']) . "</td>";
                  echo "<td>" . htmlspecialchars($row['email']) . "</td>";
                  echo "<td>" . htmlspecialchars($row['role'] ?? 'N/A' ) . "</td>";
                  echo "<td>" . 'N/A' . "</td>";
                  echo "<td><input type='checkbox'></td>";
                  echo "</tr>";
                    }
                  mysqli_free_result($result);
                          }
                  mysqli_close($conn);
?>
          </tbody>
        </table>
      </div>

    </main>

    </div>
     
  </body>
</html>

<!-- $sql = "SELECT id FROM Users WHERE user_name = ?";
        $stmt = mysqli_prepare($conn, $sql);
        mysqli_stmt_bind_param($stmt, 's', $username);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_bind_result($stmt, $id);
        mysqli_stmt_fetch($stmt);
        mysqli_stmt_close($stmt); -->

<!-- $sql = "SELECT id, name FROM StudentResults;";
if ($result = mysqli_query($conn, $sql)) {
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
      echo "<option value=\"" . $row["id"] . "\" name=\"" . $row["name"] . "\">" . $row["name"] . "</option>";
        }
      // Free up memory consumed by the $result object
      mysqli_free_result($result);
        }
    }
mysqli_close($conn);
        