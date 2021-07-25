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
            <h1 class="m-0 text-dark">Drug Category</h1>
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
          <div class="col-md-4">
              <div class="card">
                  <?php if(isset($_GET['meth'] )){  ?>
                  <div class="card-header bg-info">Edit category</div>
                  <div class="card-body">
                  <form method="post" >
                    <div class="row">
                      
                        <div class="form-group col-md-12">
                            <label for="">Category name</label>
                            <input type="text" name="cname" id="" value="<?php get_catname(); ?>" required class="form-control">
                        </div>
                        <div class="form-group col-md-12">
                            <button type="submit" name='updateCategory' class="btn btn-info">Update category</button>
                        </div>
                    </div>
                  </form>

                  </div>
                  <?php }else{ ?>
                  <div class="card-header bg-info">Add new category</div>
                  <div class="card-body">
                  <form method="post" >
                    <div class="row">
                      
                        <div class="form-group col-md-12">
                            <label for="">Category name</label>
                            <input type="text" name="cname" id="" value='<?php get_catname(); ?>' required class="form-control">
                        </div>
                        <div class="form-group col-md-12">
                            <button type="submit" name='btnCategory' class="btn btn-info">Save category</button>
                        </div>
                    </div>
                  </form>

                  </div>
                  <?php }?>
              </div>
            </div>

              <div class="col-md-8">
                  <div class="card bg-light">
                      <div class="card-body">
                      <table id="example1" class="table table-bordered table-striped table-sm  ">
                  <thead>
                  <tr>
                    <th>#</th>
                    <th>Category name</th>
                    <th>Actions</th>
                  </tr>
                  </thead>
                  <tbody>
                      <?php
                        $rowCount = 0;
                        $stmt = "SELECT * FROM tbl_drug_cat ORDER BY cat_id DESC";
                        $result = mysqli_query($con, $stmt);
                        while($row = mysqli_fetch_assoc($result)){
                          $rowCount++;
                          $name = $row['name'];
                          $id = $row['cat_id'];

                          echo "
                            <tr>
                              <td>$rowCount</td>
                              <td>$name</td>
                              <td>
                                <div class='btn-group btn-group-sm' role='group' aria-label='Basic example'>
                                  <a href='drug-category.php?id=$id&name=$name&meth=edit'  class='btn btn-info'> <i class='fa fa-edit'></i> </a>
                                  <button type='button' class='btn btn-danger' id='deleteCategory' data-id='$id'> <div class='fa fa-trash'></div> </button>
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
    //Toast
    const Toast = Swal.mixin({
      toast: true,
      position: 'top-end',
      showConfirmButton: false,
      timer: 3000
    });

    //Delete Category 
    $(document).on('click','#deleteCategory', function(){
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
                  data: 'delete_cat='+$id,
                  success: function(data){
                    if(data == 'deleted'){
                      Swal.fire(
                        'Deleted!',
                        'Your file has been deleted.',
                        'success'
                      )
                      setTimeout(function(){
                        window.location = 'https://localhost/drug_system/drug-category.php'
                      }, 2500)
                    
                    }else{
                      Swal.fire(
                        'Error!',
                        'SORRY!, something is wrong please try again.',
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

  
  if(isset($_POST['btnCategory'])){
    $name = $_POST['cname'];
    $stmt = "SELECT * FROM tbl_drug_cat WHERE name='$name'";
    $result = mysqli_query($con, $stmt);
    if(mysqli_num_rows($result) == 1){
      echo "  
      <script>
        toastr.error('SORRY!, this category is allready registred. try another one')
      </script>
      
      
      ";

    }else{
      $stmt = "INSERT INTO tbl_drug_cat (name) Values ('$name')";
      $result = mysqli_query($con, $stmt);
      if($result){
        echo " 
      <script>
        toastr.success('Category created successfully')
       setTimeout(function(){
        window.location = 'https://localhost/drug_system/drug-category.php'
       }, 1500) 
      </script>
    ";
      }

    }
  }
  
  function get_catname(){
    if(isset($_POST['name'])){
      echo $_POST['name'];
    }else{
      if(isset($_GET['name'])){
        echo $_GET['name'];
      }
    }
  }

  //Update 

  if(isset($_POST['updateCategory'])){
    $id = $_GET['id'];
    $cname = $_POST['cname'];
    $stmt = "UPDATE tbl_drug_cat SET name ='$cname' WHERE cat_id = '$id' ";
    $result = mysqli_query($con, $stmt);
    if($result){
      echo " 
      <script>
        toastr.success('Category updated successfully')
       setTimeout(function(){
        window.location = 'https://localhost/drug_system/drug-category.php'
       }, 2500) 
      </script>
    ";
    //header('location: drug-category.php');
    }else{
      echo " 
      <script>
        toastr.error('Something is wrong')
      </script>
    ";
    
    }
  }


  
  
  ?>