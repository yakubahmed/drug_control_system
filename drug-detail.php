<?php $title = "User Setting - Drug Quality Control Management System"; include('includes/header.php'); ?>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <?php include('includes/nav.php'); ?>

  <?php include('includes/sidebar.php'); ?>

  


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">User setting</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
              <li class="breadcrumb-item active">drug-detail</li>
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
                <div class="card-header bg-info"> <a href='drugs.php' class="btn btn-info btn-sm"> <i class="fa fa-arrow-left"></i> </a> Drug registration </div>
                <div class="card-body">
                  <div class="row">
                    <?php if(isset($_GET['id'])): ?>
                    <table class="table table-striped table-bordered table-sm">
                      <thead>
                        <tr>
                          <th>Durg name</th>
                          <th>Category</th>
                          <th>Drug number</th>
                          <th>Manufacured date</th>
                          <th>Expire date</th>
                          <th>Status</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php 
                          $id = $_GET['id'];
                          $stmt = "select tbl_drug.drug_id, tbl_drug.name as 'drug name', tbl_drug_cat.name as 'cat_name', tbl_manufacturer.name, tbl_manufacturer.address,
                          tbl_manufacturer.email, tbl_manufacturer.phone_number, tbl_drug.manu_date, tbl_drug.exp_date, tbl_drug.description, 
                          tbl_drug.drug_number, tbl_drug.reg_date, tbl_drug.status FROM tbl_drug, tbl_drug_cat, tbl_manufacturer
                          WHERE tbl_drug.drug_type_id = tbl_drug_cat.cat_id AND tbl_drug.manu_id = tbl_manufacturer.manu_id AND tbl_drug.drug_id = $id";
                          $result = mysqli_query($con, $stmt);
                          if(mysqli_num_rows($result) == 1){
                            $row = mysqli_fetch_assoc($result);
                          
                        ?>
                        <tr>
                          <td><?= $row['drug name'] ?></td>
                          <td><?= $row['cat_name'] ?></td>
                          <td><?= $row['drug_number'] ?></td>
                          <td><?= date("F j, Y", strtotime($row['manu_date']))  ?></td>
                          <td><?= date("F j, Y", strtotime($row['exp_date']))  ?></td>
                          <td><?= $row['status'] ?></td>
                        </tr>
                        <tr>
                          <td colspan="6"><strong>Description</strong></td>
                        </tr>
                        <tr>
                          <td colspan="6">
                           <?= $row['description'] ?>
                          </td>
                        </tr>
                        <tr> 
                            <th colspan="6">Manufacturer detail</th>
                        </tr>
                        <tr> 
                          <td colspan="2">Manufacurer name</td>
                          <td>Email</td>
                          <td>Phone number</td>
                          <td colspan="2">Address</td>
                        </tr>
                        <tr>
                          <td colspan="2"><?= $row['name'] ?></td>
                          <td ><?= $row['email'] ?></td>
                          <td ><?= $row['phone_number'] ?></td>
                          <td colspan="2"><?= $row['address'] ?></td>
                        </tr>
                      </tbody>
                    </table>
                    <?php  }else { echo " <h1>Something is wrong</h1> "; die(); } else: echo " <h1>Something is wrong</h1> "; endif; ?>
                  
                  </div>

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