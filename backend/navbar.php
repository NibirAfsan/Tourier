<header>
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand"  href="#"><img src="Capture.png" alt="logo"></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav ml-auto">
      <li class="nav-item active">
        <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
      </li>

      <!-- check if user is logged in or not, if logged in, we'll show them logout page, else login and signup page. -->
      <?php if(isset($_SESSION['user_id'])) { ?>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Accomodation</a>
        <div class="dropdown-menu">
          <a class="dropdown-item" href="index.php?page=accomodation">Accomodation</a>
          <a class="dropdown-item" href="index.php?page=addroom">Add room</a>
        </div>
      </li>

      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Baggage</a>
        <div class="dropdown-menu">
          <a class="dropdown-item" href="index.php?page=baggage">Baggage</a>
          <a class="dropdown-item" href="index.php?page=addbaggage">Add Baggage</a>
        </div>
      </li>

      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">User</a>
        <div class="dropdown-menu dropdown-menu-lg-left">
          <a class="dropdown-item" href="index.php?page=profile">Profile</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="index.php?page=Payment_history">Payment History</a>
          <a class="dropdown-item" href="index.php?page=logout">Logout</a>
        </div>
      </li>
      <?php } else { ?>
      <li class="nav-item">
        <a class="nav-link" href="index.php?page=login">Login</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="index.php?page=signup">Signup</a>
      </li>
      <?php } ?>
    </ul>
  </div>
</nav>
</header>
