  <?php
    $currentPage = basename($_SERVER['PHP_SELF']); // Retrieve current page 
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
            <span class="user-name"><?php echo $_SESSION['username']; ?> </span>
            <span class="user-role">Student</span>
          </div>
          <div class="avatar">
            <a href="../user/profile.php">
              <img
              src="/images/site/example-profile-picture.jpg"
              alt="Profile Picture"
              />
            </a> 
            
          </div>
        </div>
      </div>

      <!-- Navbar Row -->
      <nav>
        <ul class="nav-links">
          <li><a href="../user/user-homepage.php" class="<?= ($currentPage == 'user-homepage.php') ? 'active' : '' ?>">Home</a></li>
          <li><a href="../messages/message-inbox.php" class="<?= ($currentPage == 'message-inbox.php') ? 'active' : '' ?>">Messages</a></li>
          <div class="dropdown">
            <li><a  class="<?= ($currentPage == 'skill-request.php') ? 'active' : '' ?>">Skill Share</a></li>
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

    