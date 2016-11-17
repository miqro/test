<div class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="container">
      <!-- Logo and collapse button -->
      <div class="navbar-header">
        <button class="navbar-toggle collapsed" data-toggle="collapse" data-target="#main-navbar" aria-expanded="false">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        </button>
        <a href="#" class="navbar-brand">Company Logo</a>
      </div>
      <div class="collapse navbar-collapse" id="main-navbar">
        <!-- Navbar left -->
        <ul class="nav navbar-nav">
          <li <?php echo(($_SESSION["currentPage"] == "Home" ? 'class="active"' : ''));?>><a href="home.php">Home</a></li>
          <li><a href="home.php">About us</a></li>
          <li><a href="home.php">Our prices</a></li>
          <li><a href="home.php">Contact us</a></li>
        </ul>
        <!-- Navbar right -->
        <ul class="nav navbar-nav navbar-right">
          
          <?php
          // If logged in, show dashboard and logout buttons and who you are logged in as, otherwise show login and register buttons
          echo((!isset($_SESSION["username"]) || $_SESSION["username"] == "") ?
          /* Not logged in */'<li><div><a href="login.php" class="btn btn-primary btn-sm navbar-btn" style="margin-right:3px;">Login</a></div></li> <li><div><a href="register.php" class="btn btn-danger btn-sm navbar-btn">Register</a></div></li>' :
          /* Logged in     */'<li><p class="navbar-text">Logged in as ' . $_SESSION["username"] . '</p></li>' . '<li><button class="btn btn-primary navbar-btn btn-sm" style="margin-right:3px;">Dashboard</button></li>' . '<li><div><a href="logout.php" class="btn btn-danger btn-sm navbar-btn">Logout</a></div></li>');
          ?>
          
        </ul>
      </div>
    </div>
  </div>
</div>