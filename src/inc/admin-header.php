<?php
    if (session_status() === PHP_SESSION_NONE) {
      session_start();
    }

    $currentPage = basename($_SERVER['PHP_SELF']);
?>

<header>
      <!-- Top Row: Logo, Search, User Info -->
      <div class="header-top">
        <div class="site-logo">
          <a href="../user/user-homepage.php">
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
                include('../inc/dbconn.inc.php');

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
          </div>
          <div class="avatar">
            <a href="../user/profile.php">

              <?php 

                if (isset($_SESSION['username'])) {
                    $sql = "SELECT id FROM Users WHERE user_name = ?";
                    $stmt = mysqli_prepare($conn, $sql);
                    mysqli_stmt_bind_param($stmt, 's', $_SESSION['username']);
                    mysqli_stmt_execute($stmt);
                    mysqli_stmt_bind_result($stmt, $id);
                    mysqli_stmt_fetch($stmt);
                    mysqli_stmt_close($stmt);

                    if ($id) {
                        $imgSrc = "../images/user_pfp/{$id}.png"; // use the user's ID for the profile pic
                    }
                }
              ?>

              <img src="<?= $imgSrc ?>" alt="Profile Picture" />
            </a> 
            
          </div>
        </div>
      </div>

      <!-- Navbar Row -->
      <nav>
        <ul class="nav-links">
          <li><a href="../user/user-homepage.php" class="<?= ($currentPage == 'user-homepage.php') ? 'active' : '' ?>">Home</a></li>
          <li><a href="../messages/message-inbox.php" class="<?= ($currentPage == 'message-inbox.php') ? 'active' : '' ?>">Messages</a></li>
          <div class="skill-dropdown">
            <li><a  class="<?= ($currentPage == 'skill-request.php') ? 'active' : '' ?>">Skill Share</a></li>
            <div class="dropdown-content">
              <a href="../user/skill-post.php">Post Service</a>
              <a href="../user/skill-request.php"> Request Service </a>
              <a href="../user/skill-search.php"> Skill Search </a>
            </div>
          </div>
          
          <div class="admin-dropdown">
            <li><a  class="<?= ($currentPage == 'skill-request.php') ? 'active' : '' ?>">Dashboard</a></li>
            <div class="dropdown-content">
              <a href="../user/skill-post.php">Post Service</a>
              <a href="../user/skill-request.php"> Request Service </a>
              <a href="../user/skill-search.php"> Skill Search </a>
            </div>
          </div>

          <li class="credits" 
              class="<?= ($currentPage == 'home.php') ? 'active' : '' ?>">
              <a href="#">Credits</a>
          </li>
        </ul>
      </nav>

    </header>

    