<?php $title = "Category - Drug Quality Control Management System"; include('includes/header.php'); ?>
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
            <h1 class="m-0 text-dark">Manufacturer Report</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="drug-category.php">drug-category</a></li>
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
        <div class="row">
              <div class="col-md-12">
                  <div class="card bg-light">
                      <div class="card-body">
                        <div class="">
                          <form  method="post" class='row'>
                          <div class="form-group col-md-6">
                            <label for="">Filter by Manufacturer</label>
                            <select name="manu" id="" class="form-control">
                              <option value="">Select manufacturer</option>
                              <?php 
                                $stmt = "SELECT * FROM tbl_manufacturer ";
                                $result = mysqli_query($con, $stmt);
                                while($row = mysqli_fetch_assoc($result)){
                                  $id = $row['manu_id'];
                                  $name = $row['name'];
                                  echo "
                                    <option value='$id'>$name</option>
                                  ";
                                }
                              
                              ?>
                            </select>
                          </div>
                          <div class="form-group col-md-6">
                            <label for="">Filter by status</label>
                            <select name="status" id="status" class="form-control">
                              <option value="">Select status</option>
                              <option value="active">Active</option>
                              <option value="expired">Expired</option>
                            </select>
                          </div>
                          <div class="form-group col-md-6">
                            <button type="submit" name='btnFilter' class="btn btn-info"> <i class='fa fa-search'></i>  Filter </button>
                          </div>
                          </form>
                        </div>



                        <table id="" class="table table-bordered table-striped table-sm  ">
                          <thead>
                    <tr>
                      <th>#</th>
                      <th>Drug name</th>
                      <th>Category</th>
                      <th>Manufacturer</th>
                      <th>Drug number</th>
                      <th>Manufacured date</th>
                      <th>Expire date</th>
                      <th>Status</th>
                    </tr>
                    </thead>
                    <tbody>
                      
                      <?php 

                        if(isset($_GET['manu'])){
                          $manu = $_GET['manu']; 
                          $status = $_GET['status'];

                          if(empty($status)){
                                $rowCount = 0;
                              $stmt = "select tbl_drug.drug_id, tbl_drug.name as 'drug_name', tbl_drug_cat.name as 'cat_name', 
                              tbl_manufacturer.name, tbl_drug.manu_date, tbl_drug.exp_date, tbl_drug.drug_number, 
                              tbl_drug.reg_date, tbl_drug.status, tbl_drug.description FROM tbl_drug, tbl_drug_cat, tbl_manufacturer 
                              WHERE tbl_drug.drug_type_id = tbl_drug_cat.cat_id AND tbl_drug.manu_id = tbl_manufacturer.manu_id AND tbl_manufacturer.manu_id = '$manu' ";
                              $result = mysqli_query($con, $stmt);
                              while($row = mysqli_fetch_assoc($result)){
                                $rowCount++;
                                $id = $row['drug_id'];
                                $name = $row['drug_name'];
                                $category = $row['cat_name'];
                                $serial = $row['drug_number'];
                                $desc = $row['description'];
                                $manu = $row['name'];
                                $status = $row['status'];
                                $mdate =  date("F j, Y", strtotime($row['manu_date'])) ;
                                $edate = date("F j, Y", strtotime($row['exp_date']));
                                echo "
                                  <tr>
                                    <td>$rowCount</td>
                                    <td>$name</td>
                                    <td>$manu</td>
                                    <td>$category</td>
                                    <td>$serial</td>
                                    <td>$mdate</td>
                                    <td>$edate</td>
                                    <td>$status</td>
                                    
                                  </tr>
                                ";
                              }
                          }else{
                              $rowCount = 0;
                              $stmt = "select tbl_drug.drug_id, tbl_drug.name as 'drug_name', tbl_drug_cat.name as 'cat_name', 
                              tbl_manufacturer.name, tbl_drug.manu_date, tbl_drug.exp_date, tbl_drug.drug_number, 
                              tbl_drug.reg_date, tbl_drug.status, tbl_drug.description FROM tbl_drug, tbl_drug_cat, tbl_manufacturer 
                              WHERE tbl_drug.drug_type_id = tbl_drug_cat.cat_id AND tbl_drug.manu_id = tbl_manufacturer.manu_id AND tbl_manufacturer.manu_id = '$manu' AND tbl_drug.status = '$status' ";
                              $result = mysqli_query($con, $stmt);
                              while($row = mysqli_fetch_assoc($result)){
                                $rowCount++;
                                $id = $row['drug_id'];
                                $name = $row['drug_name'];
                                $category = $row['cat_name'];
                                $serial = $row['drug_number'];
                                $desc = $row['description'];
                                $manu = $row['name'];
                                $status = $row['status'];
                                $mdate =  date("F j, Y", strtotime($row['manu_date'])) ;
                                $edate = date("F j, Y", strtotime($row['exp_date']));
                                echo "
                                  <tr>
                                    <td>$rowCount</td>
                                    <td>$name</td>
                                    <td>$manu</td>
                                    <td>$category</td>
                                    <td>$serial</td>
                                    <td>$mdate</td>
                                    <td>$edate</td>
                                    <td>$status</td>
                                    
                                  </tr>
                                ";
                              }
                          }
                          
                        
                        }else{

                        $rowCount = 0;
                        $stmt = "select tbl_drug.drug_id, tbl_drug.name as 'drug_name', tbl_drug_cat.name as 'cat_name', 
                        tbl_manufacturer.name, tbl_drug.manu_date, tbl_drug.exp_date, tbl_drug.drug_number, 
                        tbl_drug.reg_date, tbl_drug.status, tbl_drug.description FROM tbl_drug, tbl_drug_cat, tbl_manufacturer 
                        WHERE tbl_drug.drug_type_id = tbl_drug_cat.cat_id AND tbl_drug.manu_id = tbl_manufacturer.manu_id;";
                        $result = mysqli_query($con, $stmt);
                        while($row = mysqli_fetch_assoc($result)){
                          $rowCount++;
                          $id = $row['drug_id'];
                          $name = $row['drug_name'];
                          $category = $row['cat_name'];
                          $serial = $row['drug_number'];
                          $desc = $row['description'];
                          $manu = $row['name'];
                          $status = $row['status'];
                          $mdate =  date("F j, Y", strtotime($row['manu_date'])) ;
                          $edate = date("F j, Y", strtotime($row['exp_date']));
                          echo "
                            <tr>
                              <td>$rowCount</td>
                              <td>$name</td>
                              <td>$manu</td>
                              <td>$category</td>
                              <td>$serial</td>
                              <td>$mdate</td>
                              <td>$edate</td>
                              <td>$status</td>
                              
                            </tr>
                          ";
                        }
                        }

                      
                      
                      ?>
                     
                    </tbody>
                          
                
                        </table>
                      </div>
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

  <?php

    if(isset($_POST['btnFilter'])){
      $manu = $_POST['manu'];
      $status = $_POST['status'];

      header('location: manufacturer-report.php?manu='. $manu . '&status='. $status );
    }
  
  
  ?>

  <script>
    //Toast
    const Toast = Swal.mixin({
      toast: true,
      position: 'top-end',
      showConfirmButton: false,
      timer: 3000
    });

   
  


  
  
  