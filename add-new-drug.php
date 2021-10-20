<?php $title = "Manufacurer - Drug Quality Control Management System"; include('includes/header.php'); ?>
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
            <h1 class="m-0 text-dark">Drug</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
              <li class="breadcrumb-item active">Drug</li>
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
                <?php if(isset($_GET['id'])): ?>
                <div class="card-header bg-info"> Edit Drug </div>
                <div class="card-body">
                  <form  method="post">
                  <div class="row">
                    <div class="form-group col-md-6">
                      <label for="">Drug category</label>
                      <select name='category' class='form-control' required>
                        <?php get_category(); ?>
                      </select>
                    </div>
                    <div class="form-group col-md-6">
                      <label for="">Drug manufacturer</label>
                      <select name="manufacturer" id="" class="form-control" required >
                        <?php get_manu(); ?>
                      </select>
                    </div>
                    <div class="form-group col-md-4">
                      <label for="">Drug name</label>
                      <input type="text" name="dname" value="<?= get_drugname(); ?>" class="form-control" placeholder="Drug name" required>
                    </div>
                    <div class="form-group col-md-4">
                      <label for="">Manufacured date</label>
                      <input type="date" name="mdate" id="" value="<?= get_mdate(); ?>" class="form-control" required>
                    </div>
                    <div class="form-group col-md-4">
                      <label for="">Expire date</label>
                      <input type="date" name="edate" id="" value="<?= get_edate() ?>" class="form-control" required>
                    </div>
                    <div class="form-group col-md-12">
                      <label for="">Drug Description</label>
                      <textarea name="desc" id="" class='form-control' required><?php get_desc(); ?></textarea>
                    </div>
                    <div class="form-group col-md-12 float-right">
                      
                        <button class='btn btn-info float-right' type='submit' name='btnUpdate'>Update drug</button> 
                        <a href='drugs.php' class='btn btn-warning float-right'>View Drugs</a>
                     
                    </div>
                  </div>
                  </form>
                </div>
                <?php else: ?>
                  <div class="card-header bg-info"> Drug registration </div>
                <div class="card-body">
                  <form  method="post">
                  <div class="row">
                    <div class="form-group col-md-4">
                      <label for="">Drug category</label>
                      <select name='category' class='form-control' required>
                        <?php get_category(); ?>
                      </select>
                    </div>
                    <div class="form-group col-md-4">
                      <label for="">Drug manufacturer</label>
                      <select name="manufacturer" id="" class="form-control" required >
                        <?php get_manu(); ?>
                      </select>
                    </div>
                    <div class="form-group col-md-4">
                      <label for="">Receiving company</label>
                      <select name="rcom" id="" class="form-control" required >
                        <?php get_rcom(); ?>
                      </select>
                    </div>
                    <div class="form-group col-md-4">
                      <label for="">Drug name</label>
                      <input type="text" name="dname" id="" value='<?= get_drugname(); ?>' class="form-control" placeholder="Drug name" required>
                    </div>
                    <div class="form-group col-md-4">
                      <label for="">Manufacured date</label>
                      <input type="date" name="mdate" id="" class="form-control" required>
                    </div>
                    <div class="form-group col-md-4">
                      <label for="">Expire date</label>
                      <input type="date" name="edate" id="" class="form-control" required>
                    </div>
                    <div class="form-group col-md-12">
                      <label for="">Drug Description</label>
                      <textarea name="desc" id="" class='form-control' required></textarea>
                    </div>
                    <div class="form-group col-md-12 float-right">
                      
                        <button class='btn btn-info float-right' type='submit' name='btnDrug'>Save drug</button> 
                        <a href='drugs.php' class='btn btn-warning float-right'>View Drugs</a>
                     
                    </div>
                  </div>
                  </form>
                </div>
                <?php endif; ?>
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
  
function get_category(){
    global $con;
    
    if(isset($_GET['category'])){
      $cat =$_GET['category'] ;
      $stmt = "SELECT * FROM tbl_drug_cat where name = '$cat' ORDER by name ASC";
      $result = mysqli_query($con, $stmt);
      while($row = mysqli_fetch_assoc($result)){
        $id = $row['cat_id'];
        $name = $row['name'];
        echo "
          <option value='$id'>$name</option>
        ";
      }
      $stmt = "SELECT * FROM tbl_drug_cat where name != '$cat' ORDER by name ASC";
      $result = mysqli_query($con, $stmt);
      while($row = mysqli_fetch_assoc($result)){
        $id = $row['cat_id'];
        $name = $row['name'];
        echo "
          <option value='$id'>$name</option>
        ";
      }
    }else{

      echo " <option value=''>Select drug category</option> ";

      $stmt = "SELECT * FROM tbl_drug_cat ORDER by name ASC";
      $result = mysqli_query($con, $stmt);
      while($row = mysqli_fetch_assoc($result)){
        $id = $row['cat_id'];
        $name = $row['name'];
        echo "
          <option value='$id'>$name</option>
        ";
       
      }
    }

  
}

function get_manu(){
  global $con;
  if(isset($_GET['manu'])){
    $manu = $_GET['manu'];
    $stmt = "SELECT * FROM manu WHERE manu_id in (SELECT manu_id from manu WHERE name ='$manu') ORDER by name ASC";
    $result = mysqli_query($con, $stmt);
    while($row = mysqli_fetch_assoc($result)){
      $id = $row['manu_id'];
      $name = $row['name'];
      echo "
        <option value='$id'>$name</option>
      ";
    }
    $stmt = "SELECT * FROM manu WHERE manu_id in (SELECT manu_id from manu WHERE name !='$manu') ORDER by name ASC";
    $result = mysqli_query($con, $stmt);
    while($row = mysqli_fetch_assoc($result)){
      $id = $row['manu_id'];
      $name = $row['name'];
      echo "
        <option value='$id'>$name</option>
      ";
    }
  }else{
    echo ' <option value="">Select manufacturer</option> ';
    $stmt = "SELECT * FROM manu";
    $result = mysqli_query($con, $stmt);
    while($row = mysqli_fetch_assoc($result)){
      $id = $row['manu_id'];
      $name = $row['manu_name'];
      echo "
        <option value='$id'>$name</option>
      ";
    }
  }

}

function get_rcom(){
  global  $con; 

  $stmt = "SELECT * FROM tbl_rec_comp";
  $result = mysqli_query($con, $stmt); 
  echo "  <option value=''>Select recieving company</option> ";
  while($row = mysqli_fetch_assoc($result)){
    $id = $row['rec_id'];
    $name = $row['name'];

    echo "  <option value='$id'>$name</option> "; 
  }
}


if(isset($_POST['btnDrug'])){
  $category = $_POST['category'];
  $manu = $_POST['manufacturer'];
  $name = $_POST['dname'];
  $mdate = $_POST['mdate'];
  $edate = $_POST['edate'];
  $desc = $_POST['desc'];
  $regdate = date('Y-m-d');
  $comp = $_POST['rcom'];
  //Get row count
  $stmt = "SELECT COUNT(*) FROM tbl_drug";
  $result = mysqli_query($con, $stmt);
  $row = mysqli_fetch_array($result);
  //Making serial number with text prefix
  $prefixText =  truncate($name, 3);
  $serial = $prefixText . '-' . 000 . date('dym') .  $row[0];

  $stmt = "INSERT INTO tbl_drug (name,drug_type_id,manu_id, rcom ,manu_date,exp_date,description, drug_number, reg_date, status )";
  $stmt.= " VALUES ('$name', '$category', '$manu',$comp ,'$mdate', '$edate', '$desc','$serial', '$date', 'active')";
  $result = mysqli_query($con, $stmt);
  if($result){
    header('location: drugs.php');
  }else{
    echo '<center>' . mysqli_error($con);
  }


}

function get_drugname(){
  if(isset($_POST['dname'])){
    echo  $_POST['dname'];
  }else if(isset($_GET['name'])){
    echo $_GET['name'];
  }
}

function get_mdate(){
  if(isset($_POST['mdate'])){
    echo  $_POST['edate'];
  }else if(isset($_GET['mdate'])){
    echo $_GET['edate'];
  }
}

function get_edate(){
  if(isset($_POST['dname'])){
    echo  $_POST['dname'];
  }else if(isset($_GET['name'])){
    echo $_GET['name'];
  }
}

function get_desc(){
  if(isset($_POST['desc'])){
    echo  $_POST['desc'];
  }else if(isset($_GET['desc'])){
    echo $_GET['desc'];
  }
}

function truncate($text, $len) {
  if (strlen($text) < $len) {
      return $text;
  }
  $text_words = explode(' ', $text);
  $out = null;


  foreach ($text_words as $word) {
      if ((strlen($word) > $len) && $out == null) {

          return substr($word, 0, $len) ;
      }
      if ((strlen($out) + strlen($word)) > $len) {
          return $out ;
      }
      $out.=" " . $word;
  }
  return $out;
}

if(isset($_POST['btnUpdate'])){
  $id = $_GET['id'];
  $category = $_POST['category'];
  $manu = $_POST['manufacturer'];
  $name = $_POST['dname'];
  $mdate = $_POST['mdate'];
  $edate = $_POST['edate'];
  $desc = $_POST['desc'];

  $stmt = "UPDATE tbl_drug SET name = '$name', drug_type_id=$category, manu_id =$manu, manu_date='$mdate', exp_date='$edate', description='$desc' WHERE drug_id = $id";
  $result = mysqli_query($con, $stmt);
  if($result){
    header('location: drugs.php');
    
  }
}
  
  
?>