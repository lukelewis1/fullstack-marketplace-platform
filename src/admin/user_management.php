<?php
//<!-- Authored by Hans Pujalte, FAN PUJA0009 -->
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
    <title>Admin Management Page</title>
    <link rel="stylesheet" href="../styles/style.css" />
    <link rel="stylesheet" href="../styles/user_management.css" /> <!-- Specific CSS for this page -->
  </head>
  <body>

    <!-- Include Admin Header -->
    <?php 
     include('../inc/admin_header.php');
    ?>

    <!-- Parent Page Wrapper -->
    <div class="page-wrapper">

    <!-- Main Content -->
     <main class="content">

      <!-- Search Bar  -->
      <!-- Note: Doesn't work lmao  -->
      <search> 
      <div class="search-bar admin-search-bar">
        <form action="#" method="get">
          <input
          type="search"
          id="search-input"
          name="q"
          placeholder="Search"/>
        </form>
      </div>
     
     </search>
      
      <!-- User Management Table !-->
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
              <th>Action</th> <!-- Empty header for checkbox -->
            </tr>
          </thead>
          <tbody>
              <?php
                /// Fetch all users from db
                $sql = "SELECT id, f_name, l_name, email, role, fuss_credit FROM Users;";
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

                  /// Action Dropdown Menu
                  echo "<td>
                    <div class='dropdown action-dropdown'>
                      <button>Options</button>
                      <div class='dropdown-content'>
                        <a href='/user/view_profile.php?id=" . urlencode($row['id']) . "'>View</a>
                        <a href='#'
                          class='edit-btn' 
                          data-id='" . htmlspecialchars($row['id']) . "' 
                          data-fname='" . htmlspecialchars($row['f_name']) . "' 
                          data-lname='" . htmlspecialchars($row['l_name']) . "' 
                          data-email='" . htmlspecialchars($row['email']) . "' 
                          data-role='" . htmlspecialchars($row['role'] ?? '') . "'
                          data-credits='" . htmlspecialchars($row['fuss_credit'] ?? 0) . "'>
                          Edit
                        </a>
                        <a href='delete_user.php?id=" . urlencode($row['id']) . "' class='delete-btn'>Delete</a>
                        <a href='suspend_user.php?id=" . urlencode($row['id']) . "' class='suspend-btn'>Suspend</a>
                      </div>
                    </div>
                  </td>";
                  echo "</tr>";

                    }
                  mysqli_free_result($result);
                          }
                  mysqli_close($conn);
                ?>
          </tbody>
        </table>
      </div>

      <!-- Edit User Modal -->
      <div id="editModal" class="modal">
        <div class="modal-content">
          <span class="close">&times;</span>
          <h2>Edit User</h2>
          <form id="editForm">
            <input type="hidden" name="id" id="edit-id">
            <label>First Name:</label>
            <input type="text" name="f_name" id="edit-f_name" required>
            <label>Last Name:</label>
            <input type="text" name="l_name" id="edit-l_name" required>
            <label>Email:</label>
            <input type="email" name="email" id="edit-email" required>
            <label>Role:</label>
            <input type="text" name="role" id="edit-role" required>
            <label>FUSS Credits:</label>
            <input type="number" name="credits" id="edit-credits" min="0" max="100" required>
            <button type="submit">Save Changes</button>
          </form>
        </div>
      </div>

      <!-- Delete Confirm Modal -->
    <div id="confirmModal" class="modal">
      <div class="modal-content">
        <span class="close">&times;</span>
        <h2>Confirm Deletion</h2>
        <p>Are you sure you want to delete this user?</p>
        <form id="submitForm">
          <div class="button-group">
          <button type="submit" class="confirm-btn">Yes</button>
          <button type="button" class="cancel-btn">Cancel</button>
          </div>
        </form>
      </div>
    </div>

    <!-- Suspend Confirm Modal -->
      <div id="suspendModal" class="modal">
      <div class="modal-content">
        <span class="close">&times;</span>
          <h2>Confirm Suspension</h2>
          <p>Are you sure you want to suspend this user?</p>
          <form id="submitForms">
            <div class="button-group">
            <button type="submit" class="confirm-btn">Yes</button>
            <button type="button" class="cancel-btn">Cancel</button>
            </div>
          </form>
      </div>
    </div>

    </main>

    </div>
    <!-- Include JS for modals -->
     <script src="../admin/edit_modal.js"></script>
     <script src="../admin/delete_modal.js"></script>
     <script src="../admin/suspend_modal.js"></script>
  </body>
</html>
        
