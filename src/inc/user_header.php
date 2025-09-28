<?php
    if (session_status() === PHP_SESSION_NONE) {
      session_start();
    }

    $currentPage = basename($_SERVER['PHP_SELF']);

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
          <a href="/user/user_homepage.php">
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
            <span class="user-role"> <?php echo htmlspecialchars(get_role($_SESSION['username'] ?? '')); ?> </span>
              <span>FUSS Credit Balance: <?php echo $credit_balance; ?></span>
          </div>
          <div class="avatar">
            <a href="/user/profile.php">

              <img src="<?php echo htmlspecialchars(get_profile_image($_SESSION['username'] ?? '')) ?>" alt="Profile Picture" />
            </a> 
            
          </div>
        </div>
      </div>

      <!-- Navbar Row -->
      <nav>
        <ul class="nav-links">
          <li><a href="/user/user_homepage.php" class="<?= ($currentPage == 'user_homepage.php') ? 'active' : '' ?>">Home</a></li>
          <li><a href="/messages/message_inbox.php" class="<?= ($currentPage == 'message_inbox.php') ? 'active' : '' ?>">
                  Messages
                  <span id="msg-badge" class="notification-dot hidden"></span>
              </a>
          </li>
          <div class="dropdown">
            <li><a  class="<?= ($currentPage == 'skill_request.php') ? 'active' : '' ?>">Skill Share</a></li>
            <div class="dropdown-content">
              <a href="/user/skill_post.php">Post Service</a>
              <a href="/user/skill_request.php"> Request Service </a>
              <a href="/user/skill_search.php"> Skill Search </a>
            </div>
          </div>

            <div class="dropdown">
                <li><a class="<?= ($currentPage == 'friends.php') ? 'active' : '' ?>">Friends</a></li>
                <div class="dropdown-content">
                    <a href="/user/friends/friends.php">Friends</a>
                    <a href="/user/friends/search_friends.php">Add Friend</a>
                </div>
            </div>

          <li class="credits" 
              class="<?= ($currentPage == 'home.php') ? 'active' : '' ?>">
              <a href="#">Credits</a>
          </li>
        </ul>
      </nav>
    <script src="/scripts/real_time_msg_script.js"></script>
    </header>

    