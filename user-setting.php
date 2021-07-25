<?php $title = "User setting - Drug control system"; include('includes/header.php'); ?>
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
            <h1 class="m-0 text-dark">User setting</h1>
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
        <!-- Small boxes (Stat box) -->
        <div class="row">
      
     
          <!-- ./col -->
        </div>
        <!-- /.row -->
        <!-- Main row -->
        <div class="row">
          <div class="col-md-12">
              <div class="card">
                  <div class="card-header bg-dark"> <strong >User detail</strong></div>
                  <div class="card-body">
                    <form  method="post">
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="">Email Address</label>
                            <input type="email" name="" id="" class="form-control" disabled value='<?php echo $_SESSION["email"]; ?>'>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="">Full name</label>
                            <input type="text" name="fname" id="fname" class="form-control"  value='<?php echo $_SESSION["name"]; ?>'>
                        </div>

                        <div class="form-group col-md-12">
                           
                            <input type="submit" value="Submit" class="btn btn-info" name='btnSubmitDetail'>
                        </div>

                        
                    </div>
                    </form>
                  </div>
              </div>

           
              <div class="card">
                  <div class="card-header bg-dark"><strong>Password setting</strong></div>
                  <div class="card-body">
                      <form  method="post">
                      <div class="row">
                          <div class="form-group col-md-12">
                              <label for="">Current password</label>
                              <input type="password" name="password" id="password" class="form-control">
                            </div>

                          <div class="form-group col-md-6">
                              <label for="">New password</label>
                              <input type="password" name="newpass" id="newpass" class="form-control"  >
                              <div id="password-strength-status"></div>
                         
                            </div>

                          <div class="form-group col-md-6">
                              <label for="">New password</label>
                              <input type="password" name="cpass" id="cpass" class="form-control" >
                          </div>

                          <div class="form-group col-md-12">
                              <input type="submit" value="Update Password" class="btn btn-primary" name='btnChangePass' >
                          </div>
                      </div>
                      </form>
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

    if(isset($_POST['btnChangeProfile'])){
      $id = $_SESSION['user_id'];

      $pimage = $_FILES['pimage']['name'];
      $pimage_tmp = $_FILES['pimage']['tmp_name'];
     
      if(move_uploaded_file($pimage_tmp,"dist/img/$pimage")){
          $stmt = "UPDATE tbl_user SET profile_img = '$pimage' WHERE user_id = $id";
          $result = mysqli_query($con, $stmt);
          if($result){
              header('location: logout.php');
          }else{
              echo "Faailed";
          }
      }else{
          echo "Failed";
      }
  
    }
  
  ?>


<script>
function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        
        reader.onload = function(e) {
        $('#profile').attr('src', e.target.result);
        }
        
        reader.readAsDataURL(input.files[0]); // convert to base64 string
    }
}

$("#pimage").change(function() {
  readURL(this);
});
</script>

<script>

function checkPasswordStrength() {
    var number = /([0-9])/;
    var alphabets = /([a-zA-Z])/;
    var special_characters = /([~,!,@,#,$,%,^,&,*,-,_,+,=,?,>,<])/;
    if($('#password').val().length<6) {
      $('#password-strength-status').removeClass();
      $('#password-strength-status').addClass('text-warning');
      $('#password-strength-status').html("Weak (should be atleast 6 characters.)");
    } else {  	
    if($('#newpass').val().match(number) && $('#password').val().match(alphabets) && $('#password').val().match(special_characters)) {            
      $('#password-strength-status').removeClass();
      $('#password-strength-status').addClass('text-success');
      $('#password-strength-status').html("Strong");
    } else {
      $('#password-strength-status').removeClass();
      $('#password-strength-status').addClass('text-info');
      $('#password-strength-status').html("Medium (should include alphabets, numbers and special characters.)");
    }}
  }
</script>

<?php

if(isset($_POST['btnSubmitDetail'])){
  $id = $_SESSION['user_id'];
  $name = $_POST['fname'];
  $stmt = "UPDATE tbl_login SET fullname = '$name' WHERE login_id = '$id'";
  $result = mysqli_query($con, $stmt);
  if($result){
    $_SESSION['name'] = $name;
    header('location: user-setting.php');
  }else{
    echo "Failed";
  }
}


if(isset($_POST['btnChangePass'])){
  $id = $_SESSION['user_id'];
  $password = $_POST['password'];
  $newp = $_POST['newpass'];
  $conp = $_POST['cpass'];

  $stmt = "SELECT * FROM tbl_login WHERE login_id = '$id' AND password = '$password'";
  $result = mysqli_query($con, $stmt);
  if(mysqli_num_rows($result) > 0){
    if($newp == $conp){
      $stmt = "UPDATE tbl_login SET password = '$newp' WHERE login_id = '$id'";
      $result = mysqli_query($con, $stmt);
      if($result){
        header('location: logout.php');
      }
    }else{
    echo " <script> alert('Password and confirm password does not match') </script> ";

    }
  }else{
    echo " <script> alert('Invalid password') </script> ";
  }
}


?>