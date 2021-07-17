<?php
include 'dbconnect.php';
session_start();
if(!isset($_SESSION["sess_user"])){
 header("Location: index.php");


}
?>


<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Test</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- DataTables -->
    <link rel="stylesheet" href="plugins/1.10.22/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="plugins/buttons/1.6.5/css/buttons.dataTables.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
 
<?php include 'header.php';?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>User List</h1>
          </div>
          <div class="col-sm-6">
            
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
           

            <div class="card">
              <div class="card-header">
               <a href="client.php" class="add btn btn-info"><i class="fa fa-plus" aria-hidden="true"></i>
Add New</a>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Sl</th>
                    <th>Employee code</th>
                    <th>Employee Name</th>
                    <th>Department</th>
                    <th>Age</th>
                    <th>Experience</th>
                  
                  </tr>
                  </thead>
                 
                  <tbody>
                    <?php
                    $sl=1;
                     $squery = "select * from employee ORDER BY id DESC";
                    $result = mysqli_query($conn,$squery);
                     while( $row = mysqli_fetch_array($result))
                        {
                          $id=$row['id'];
                         
                          
                    ?>
                  <tr>
                           <td><?php echo $sl;?></td>
                   
                          
                           
                     <td><?php echo $row['empcode'];?></td>
                        <td><?php echo $row['empname'];?></td>
                         <td><?php echo $row['dep'];?></td>
                           <td><?php echo $row['age'];?></td>
                           <td><?php echo $row['exp'];?></td>
                        
                  </tr>

                <?php $sl++;  } ?>
          
                  </tbody>
              
                  <tfoot>
                  
                  </tfoot>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <?php include 'footer.php';?>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
 <!-- DataTables -->
<script src="plugins/1.10.22/js/jquery.dataTables.min.js"></script> 
<script src="plugins/buttons/1.6.5/js/dataTables.buttons.min.js"></script>
<script src="plugins/buttons/1.6.5/js/buttons.print.min.js"></script>
<script src="plugins/buttons/1.6.5/js/buttons.colVis.min.js"></script>
<script src="plugins/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="plugins/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="plugins/buttons/1.6.5/js/buttons.html5.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<!-- page script -->
<script>
  $(function () {
    $("#example1").DataTable({

      "responsive": true,
      "autoWidth": false,
      "stateSave": true

    });
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
      "stateSave": true
    });
  });
</script>

</body>
</html>
