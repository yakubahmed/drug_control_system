<?php $title = "Drugs - Drug Quality Control Management System"; include('includes/header.php'); ?>
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
            <h1 class="m-0 text-dark">Drugs</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
              <li class="breadcrumb-item active">Company</li>
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
          <div class="col-md-4">
              <div class="card">
                  <?php if(isset($_GET['meth'])): ?>
                  <div class="card-header bg-info">Edit Company</div>
                  <div class="card-body">
                      <form  method="post">
                        <div class="row">
                          <div class="form-group col-md-12">
                              <label for="">Manufacturer name</label>
                              <input type="text" name="mname" id="" class="form-control" required value="<?php get_mname(); ?>">
                          </div>
                          <div class="form-group col-md-12">
                              <label for="">Email Address</label>
                              <input type="email" name="email" id="" class="form-control" required value="<?php get_email(); ?>">
                          </div>
                          <div class="form-group col-md-12">
                              <label for="">Phone number</label>
                              <input type="text" name="phone" id="" class="form-control" required value="<?php get_phone(); ?>">
                          </div>
                          <div class="form-group col-md-12">
                              <label for="">Address</label>
                              <input type="text" name="addr" id="" class="form-control" required value="<?php get_addr(); ?>">
                          </div>
                          <div class="form-group col-md-12">
                              <button type="submit" class="btn btn-info" name='btnUpdateManu'>Update manufacturer</button>
                          </div>

                        </div>
                      </form>
                    </div>
                  <?php else: ?>
                    <div class="card-header bg-info">Add new company</div>
                   <div class="card-body">
                      <form  method="post">
                        <div class="row">
                          <div class="form-group col-md-12">
                              <label for="">Company name</label>
                              <input type="text" name="mname" id="" class="form-control" required value="<?php get_mname(); ?>">
                          </div>
                          <div class="form-group col-md-12">
                              <label for="">Email Address</label>
                              <input type="email" name="email" id="" class="form-control" required value="<?php get_email(); ?>">
                          </div>
                          <div class="form-group col-md-12">
                              <label for="">Phone number</label>
                              <input type="text" name="phone" id="" class="form-control" required value="<?php get_phone(); ?>">
                          </div>
                          <div class="form-group col-md-12">
                              <label for="">Address</label>
                              <input type="text" name="addr" id="" class="form-control" required value="<?php get_addr(); ?>">
                          </div>
                          <div class="form-group col-md-12">
                              <button type="submit" class="btn btn-info" name='btnManufacturer'>Save manufacturer</button>
                          </div>

                        </div>
                      </form>
                    </div>
                    <?php endif;?>
              </div>
            </div>

              <div class="col-md-8">
                  <div class="card bg-light">
                      <div class="card-body">
                      <table id="example1" class="table table-bordered table-striped table-sm">
                  <thead>
                  <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Address</th>
                    <th>Actions</th>
                  </tr>
                  </thead>
                  <tbody>
                        <?php 
                          $rowCount = 0;
                          $stmt = "SELECT * FROM tbl_rec_comp ORDER by rec_id DESC ";
                          $result = mysqli_query($con, $stmt);
                          while($row = mysqli_fetch_assoc($result)){
                            $rowCount++;
                            $id = $row['rec_id'];
                            $name = $row['name'];
                            $email = $row['email'];
                            $addr = $row['address'];
                            $phone = $row['phone_number'];
                            $date = $row['reg_date'];

                            echo "

                              <tr>
                                <td>$rowCount</td>
                                <td>$name</td>
                                <td>$email</td>
                                <td>$phone</td>
                                <td>$addr</td>
                                <td>
                                  <div class='btn-group btn-group-sm' role='group' aria-label='Basic example'>
                                    <a href='companies.php?id=$id&name=$name&meth=edit&email=$email&addr=$addr&phone=$phone'  class='btn btn-info'> <i class='fa fa-edit'></i> </a>
                                    <button type='button' class='btn btn-danger' id='deleteManu' data-id='$id'> <div class='fa fa-trash'></div> </button>
                                  </div>
                                </td>
                              </tr>

                            ";
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

  <script>
    $(document).ready(function(){
      const Toast = Swal.mixin({
      toast: true,
      position: 'top-end',
      showConfirmButton: false,
      timer: 3000
    });
    })

      //Delete Category 
      $(document).on('click','#deleteManu', function(){
      $id = $(this).data('id');
      console.log($id)
        Swal.fire({
          title: 'Are you sure?',
          text: "You won't be able to revert this!",
          icon: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
          if (result.value) {
            $.ajax({
                  url:'jquery.php',
                  type:'post',
                  data: 'delete_manu='+$id,
                  success: function(data){
                    if(data == 'deleted'){
                      Swal.fire(
                        'Deleted!',
                        'Your file has been deleted.',
                        'success'
                      )
                      setTimeout(function(){
                        window.location = 'https://localhost/drug_system/companies.php'
                      }, 2500)
                    
                    }else{
                      Swal.fire(
                        'Error!',
                        'SORRY!, product gan lama tiri karo.',
                        'error'
                      )
                      
                    }
                  }
                })
            
          }
        })
    });
  </script>

  <?php 
  
  
  if(isset($_POST['btnManufacturer'])){
    $name = $_POST['mname'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $addr = $_POST['addr'];
    $regdate = date('Y-m-d');


    $stmt = "SELECT * FROM tbl_rec_comp WHERE name = '$name'";
    $result = mysqli_query($con, $stmt);
    if(mysqli_num_rows($result) == 1){
      echo "
        <script>
        toastr.error('SORRY!, this manufacturer is all ready registered try another one')
        </script>
      ";
    }else{
      $stmt = "SELECT * FROM tbl_rec_comp WHERE email = '$email'";
      $result = mysqli_query($con, $stmt);
      if(mysqli_num_rows($result) == 1){
        echo "
        <script>
        toastr.error('SORRY!, this email is taken. try another one')
        </script>
      ";
      }else{

        $stmt = "INSERT into  tbl_rec_comp (name, address, email, phone_number, reg_date)";
        $stmt.= " VALUES('$name', '$addr', '$email', '$phone', '$regdate')";
        $result = mysqli_query($con, $stmt);
        if($result){
          header('location: companies.php');
        }else{
          echo "
          <script>
          toastr.error('Something is wrong')
          </script>
        ";
        }
      }
    }


  }
  //Update 
  if(isset($_POST['btnUpdateManu'])){
    $name = $_POST['mname'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $addr = $_POST['addr'];
    $regdate = date('Y-m-d');
    $id = $_GET['id'];
    $stmt = "UPDATE tbl_rec_comp SET name = '$name', email = '$email', phone_number='$phone', address='$addr' WHERE rec_id = '$id'";
    $result = mysqli_query($con, $stmt);
    if($result){
      header('location: rec-com.php');
    }
  }

  function get_mname(){
    if(isset($_POST['mname'])){
      echo $_POST['mname'];
    }else if(isset($_GET['name'])){
      echo $_GET['name'];
    }

  }

  function get_email(){
    if(isset($_POST['email'])){
      echo $_POST['email'];
    }else if(isset($_GET['email'])){
      echo $_GET['email'];
    }

  }

  function get_phone(){
    if(isset($_POST['phone'])){
      echo $_POST['phone'];
    }else if(isset($_GET['phone'])){
      echo $_GET['phone'];
    }

  }

  function get_addr(){
    if(isset($_POST['addr'])){
      echo $_POST['addr'];
    }else if(isset($_GET['addr'])){
      echo $_GET['addr'];
    }

  }





  
  
  
  ?>