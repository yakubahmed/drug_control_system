  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-info  elevation-4" >
    <!-- Brand Logo -->
    <a href="index.php" class="brand-link">
      <img src="dist/img/drug.png" alt="Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light"> <strong>Drug Control <small>System</small> </strong></span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->


      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
               <li class="nav-item has-treeview menu-open">
            <a href="index.php" class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
                
              </p>
            </a>
       
          </li>
          <li class='nav-item'>
            <a href='drug-category.php' class='nav-link'>
              <i class='nav-icon fa fa-list'></i>
              <p>Drug category</p>
            </a>
          </li>

          <li class='nav-item'>
            <a href='companies.php' class='nav-link'>
              <i class='nav-icon fa fa-industry'></i>
              <p>Companies</p>
            </a>
          </li>

          <li class='nav-item'>
            <a href='manufacturer.php' class='nav-link'>
              <i class='nav-icon fa fa-industry'></i>
              <p>Manufacturer</p>
            </a>
          </li>

          <li class='nav-item'>
            <a href='drugs.php' class='nav-link'>
              <i class='nav-icon fa fa-prescription-bottle-alt'></i>
              <p>Drug</p>
            </a>
          </li>     
          
          <li class='nav-item'>
            <a href='user-setting.php' class='nav-link'>
              <i class='nav-icon fa fa-user-cog'></i>
              <p>User setting</p>
            </a>
          </li>     

          <li class="nav-item has-treeview">
              <a href="#" class="nav-link">
                <i class="nav-icon fa fa-file"></i>
                <p>
                  Reports                      <i class="fas fa-angle-left right"></i>
                  <!-- <span class="badge badge-info right">2</span> -->
                </p>
              </a>
                <ul class="nav nav-treeview">
                  <li class='nav-item'>
                    <a href='manufacturer-report.php' class='nav-link'>
                      <i class='far fa-circle nav-icon'></i>
                      <p>Manufacturer report</p>
                    </a>
                  </li>

                  <li class='nav-item'>
                    <a href='drugs-report.php' class='nav-link'>
                      <i class='far fa-circle nav-icon'></i>
                      <p>Drugs report</p>
                    </a>
                  </li>
                
                
                  </ul>
                </li>
 
          
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
