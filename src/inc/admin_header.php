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
    $credit_balance = $row['fuss_credit'];
    $statement->close();
?>

<header>
    <link rel="stylesheet" href="../styles/real_time_style.css" />
      <!-- Top Row: Logo, Search, User Info -->
      <div class="header-top">
        <div class="site-logo">
          <a href="../admin/admin_homepage.php">
            <img
              src="/images/site/flinders-logo.png"
              alt="Flinders Logo"
            />
          </a>
        </div>

        <div class="search-bar">
          <form action="#" method="get">
            <input
              type="search"
              id="search-input"
              name="q"
              placeholder="Search"
            />
          </form>
        </div>

        <div class="user-info">
          <div class="user-name-role">
            <span class="user-name"><?php echo isset($_SESSION['username']) ? htmlspecialchars($_SESSION['username']) : 'Guest'; ?> </span>
            <span class="user-role">
              <?php

                if (isset($_SESSION['username'])) {
                    $sql = "SELECT role FROM Users WHERE user_name = ?";
                    $stmt = mysqli_prepare($conn, $sql);
                    mysqli_stmt_bind_param($stmt, 's', $_SESSION['username']);
                    mysqli_stmt_execute($stmt);
                    mysqli_stmt_bind_result($stmt, $role);
                    mysqli_stmt_fetch($stmt);
                    echo htmlspecialchars($role ?? 'Student'); // fallback if role is null
                    mysqli_stmt_close($stmt);
                } else {
                    echo "Student";
                }
                ?>
            </span>
              <span>FUSS Credit Balance: <?php echo $credit_balance; ?></span>
          </div>
          <div class="avatar">
            <a href="/user/profile.php">
              <img src="<?php echo htmlspecialchars(get_profile_image($_SESSION['username'] ?? '')); ?>" alt="Profile Picture" />
            </a> 
            
          </div>
        </div>
      </div>

      <!-- Navbar Row -->
      <nav>
        <ul class="nav-links">
          <li><a href="/admin/admin_homepage.php" class="<?= ($currentPage == 'admin_homepage.php') ? 'active' : '' ?>">Home</a></li>
          <li>
              <a href="/messages/message_inbox.php" class="<?= ($currentPage == 'message_inbox.php') ? 'active' : '' ?>">
                  Messages
                  <span id="msg-badge" class="notification-dot hidden"></span>
              </a>
          </li>
          <div class="dropdown">
            <li><a  class="<?= ($currentPage == 'skill_manage.php') ? 'active' : '' ?>">Skill Share</a></li>
            <div class="dropdown-content">
                <a href="/user/skill_post.php">Post Service</a>
                <a href="/user/skill_manage.php"> Service Management </a>
                <a href="/user/skill_search.php"> Skill Search </a>
                <a href="/user/skill_bookings.php">Skill Bookings</a>
            </div>
          </div>
          
          <div class="dropdown">
            <li><a  class="<?= ($currentPage == 'skill_manage.php') ? 'active' : '' ?>">Dashboard</a></li>
            <div class="dropdown-content">
                <a href="/admin/insights.php">Insights</a>
                <a href="/admin/user_management.php"> User Management </a>
                <a href="/admin/content_moderation.php"> Content Moderation </a>
                <a href="/admin/skill_category_management.php"> Skill Category Management </a>
            </div>
          </div>

            <div class="dropdown">
                <li><a class="<?= ($currentPage == 'friends.php') ? 'active' : '' ?>">Friends</a></li>
                <div class="dropdown-content">
                    <a href="/user/friends/friends.php">Friends</a>
                    <a href="/user/friends/search_friends.php">Add Friend</a>
                    <a href="/user/friends/pending_friends.php">Pending Friends</a>
                </div>
            </div>

            <li><a href="/inc/logout.php" class="<?= ($currentPage == 'logout.php') ? 'active' : '' ?>" id="logout-link">Logout</a></li>
            <div id="logout-modal" style="display:none; position:fixed; top:0;left:0;width:100%;height:100%;background:rgba(0,0,0,0.5);">
                <div style="background:#fff;padding:20px;margin:100px auto;width:300px;text-align:center" id="logout">
                    <p>Are you sure you want to log out?</p>
                    <p>You WILL have to log back in to access FUSS.</p>
                    <button id="logout-yes">Yes</button>
                    <button id="logout-no">No</button>
                </div>
            </div>

            <li class="credits"
              class="<?= ($currentPage == 'home.php') ? 'active' : '' ?>">
              <a href="#">Credits</a>
          </li>
        </ul>
      </nav>
    <script src="/scripts/logout_script.js"></script>
    <script src="/scripts/real_time_msg_script.js"></script>
    </header>

    