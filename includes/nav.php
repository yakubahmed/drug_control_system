  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-dark navbar-dark ">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
    </ul>

    <ul class="navbar-nav ml-auto navbar-nav">
      <li class="nav-item d-none d-sm-inline-block active">
        <p class='text-light my-1'> <strong> <i class='fa fa-user'></i> <?= $_SESSION['name'] ?></strong> </p>
      </li>
    </ul>

    
    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto navbar-nav">
      <li class="nav-item d-none d-sm-inline-block active">
        <a href="logout.php" class="nav-link"> <span class='fa fa-sign-out-alt'></span> Logout</a>
      </li>
   
    </ul>
  </nav>
  <!-- /.navbar -->