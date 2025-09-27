<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if (!isset($_SESSION['username'])) {
    header("Location: ../index.php");
    exit;
}
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
              <td>1001</td>
              <td>Jane</td>
              <td>Doe</td>
              <td>jane.doe@example.com</td>
              <td>Student</td>
              <td>Active</td>
              <td><input type="checkbox"></td>
            </tr>
            <tr>
              <td>1002</td>
              <td>John</td>
              <td>Smith</td>
              <td>john.smith@example.com</td>
              <td>Admin</td>
              <td>Inactive</td>
              <td><input type="checkbox"></td>
            </tr>
            <!-- Add more rows as needed -->
          </tbody>
        </table>
      </div>

    </main>

    </div>
     
  </body>
</html>
