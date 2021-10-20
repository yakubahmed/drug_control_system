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
            <h1 class="m-0 text-dark">Drugs</h1>
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
                <div class="form-group col-md-12 float-right my-1">
                  <a href="add-new-drug.php" class="btn btn-info float-right">Add new drug</a>  
                </div>
                <div class="card-body">
                  <table id="example1" class="table table-bordered table-striped table-sm">
                    <thead>
                    <tr>
                      <th>#</th>
                      <th>Drug name</th>
                      <th>Category</th>
                      <th>Drug number</th>
                      <th>Manufacured date</th>
                      <th>Expire date</th>
                      <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                      <?php 
                        $rowCount = 0;
                        $stmt = "SELECT * FROM view_drug WHERE status = 'active'";
                        $result = mysqli_query($con, $stmt);
                        while($row = mysqli_fetch_assoc($result)){
                          $rowCount++;
                          $id = $row['drug_id'];
                          $name = $row['drug_name'];
                          $category = $row['cat_name'];
                          $serial = $row['drug_number'];
                          $desc = $row['description'];
                          $manu = $row['name'];
                          $mdate =  date("F j, Y", strtotime($row['manu_date'])) ;
                          $edate = date("F j, Y", strtotime($row['exp_date']));
                          echo "
                            <tr>
                              <td>$rowCount</td>
                              <td>$name</td>
                              <td>$category</td>
                              <td>$serial</td>
                              <td>$mdate</td>
                              <td>$edate</td>
                              <td>
                                <div class='btn-group btn-group-sm' role='group' aria-label='Basic example'>
                                  <a href='add-new-drug.php?id=$id&name=$name&category=$category&mdate=$mdate&edate=$edate&manu=$manu&desc=$desc'  class='btn btn-info' > <i class='fa fa-edit'></i> </a>
                                  <button type='button' class='btn btn-secondary'><a href='drug-detail.php?id=$id' class='text-light'> <i class='fa fa-list'></i></a> </button>
                                  <button type='button' class='btn btn-danger' id='deleteDrug' data-id='$id'> <div class='fa fa-trash'></div> </button>
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
    $(document).on('click','#deleteDrug', function(){
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
                  data: 'delete_drug='+$id,
                  success: function(data){
                    if(data == 'deleted'){
                      Swal.fire(
                        'Deleted!',
                        'Your file has been deleted.',
                        'success'
                      )
                      setTimeout(function(){
                        window.location = 'https://localhost/drug_system/drugs.php'
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