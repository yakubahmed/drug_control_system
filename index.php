<?php include('includes/header.php'); include('includes/config.php'); ?>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <?php include('includes/nav.php');?>

  <?php include('includes/sidebar.php'); ?>


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Balance</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Main row -->
        <div class="row">
          <div class="col-md-4">
              <div class="card shadow bg-info text0-light">
                <div class="card-body">
                    <h3>Manufacturers</h3>
                    <hr class='bg-light'>
                    <h1 style='font-weight:bolder;'>
                        
                        <?php
                        $stmt = "SELECT * FROM tbl_manufacturer";
                        $result = mysqli_query($con, $stmt);
                        echo mysqli_num_rows($result);
                        
                        ?>
                    </h1>
                </div>
              </div>
          </div>
          <div class="col-md-4">
              <div class="card shadow bg-info text0-light">
                <div class="card-body">
                    <h3>Drugs</h3>
                    <hr class='bg-light'>
                    <h1 style='font-weight:bolder;'>
                     
                        
                         <?php
                         $stmt = "SELECT * FROM tbl_drug";
                         $result = mysqli_query($con, $stmt);
                         echo mysqli_num_rows($result);
                         
                         ?>
                       
                    </h1>
                </div>
              </div>
          </div>

          <div class="col-md-4">
              <div class="card shadow bg-info text0-light">
                <div class="card-body">
                    <h3>Expired</h3>
                    <hr class='bg-light'>
                    <h1 style='font-weight:bolder;'>
                        
                        
                         <?php
                         $stmt = "SELECT * FROM tbl_drug WHERE status = 'expired'";
                         $result = mysqli_query($con, $stmt);
                         echo mysqli_num_rows($result);
                         
                         ?>
                        
                        
                    </h1>
                </div>
              </div>
          </div>
      
         

          <div class="col-md-12">
          <div class="card">
              <div class="card-header bg-info">
                <h3 class="card-title">Expired Drugs</h3>

              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0 bg-light" style="height: 300px;">
                <table class="table table-head-fixed text-nowrap table-sm table-striped">
                  <thead>
                  <tr>
                      <th>#</th>
                      <th>Drug name</th>
                      <th>Number</th>
                      <th>Status</th>
                      <th>Manufacturer</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php 
                    
                    $stmt = "select tbl_drug.drug_id, tbl_drug.name as 'drug name', tbl_drug_cat.name as 'drug name', tbl_manufacturer.name, tbl_manufacturer.address,
                    tbl_manufacturer.email, tbl_manufacturer.email, tbl_drug.manu_date, tbl_drug.exp_date, tbl_drug.description, 
                    tbl_drug.drug_number, tbl_drug.reg_date, tbl_drug.status FROM tbl_drug, tbl_drug_cat, tbl_manufacturer
                    WHERE tbl_drug.drug_type_id = tbl_drug_cat.cat_id AND tbl_drug.manu_id = tbl_manufacturer.manu_id AND tbl_drug.status = 'expired'    ";
                    
                    $result = mysqli_query($con, $stmt);
                    $rowCount = 0;
                    while($row = mysqli_fetch_assoc($result)){
                      $rowCount++; 
                      $id = $row['drug_id'];
                      $name = $row['drug name'];
                      $num = $row['drug_number'];
                      $status = $row['status'];
                      $manu = $row['name'];

                      echo "
                        <tr>
                          <td>$rowCount</td>
                          <td>$name</td>
                          <td>$num</td>
                          <td>$status</td>
                          <td>$manu</td>
                        </tr>
                      
                      ";
                    }
                    
                    ?>
              
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
          </div>

          
        </div>

         
          
        </div>
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
 
  <?php include('includes/footer.php'); ?>
