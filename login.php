<?php
include ('dbconnect.php');
session_start();

?>


<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Test | Login</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body style="background-image: url('img/login-background1.jpg'); background-size: cover;" class="hold-transition login-page">
<div class="login-box" style="margin-top: -200px;">
  <div class="login-logo">
   <img src="img/logo.png" class="img-responsive">
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <!-- <p class="login-box-msg">Sign in to start your session</p>
 -->
      <form  method="post">
        <div class="input-group mb-3">
          <input type="text" class="form-control" name="username" placeholder="Username">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" name="password" placeholder="Password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
         
          <div class="col-4">
            <button type="submit" name="submit" value="submit" class="btn btn-info btn-block">Login</button>
          </div>
          <!-- /.col -->
        </div>
      </form>
           <?php
                if(isset($_POST['submit']))
                {
                  if(!empty($_POST['username']) && !empty($_POST['password'])){
 $user = $_POST['username'];
 $pass = $_POST['password'];
 
 $query = mysqli_query($conn, "SELECT * FROM user WHERE username='".$user."' AND password='".$pass."'");
 $numrows = mysqli_num_rows($query);
 if($numrows !=0)
 {
 while($row = mysqli_fetch_assoc($query))
 {
  $userid=$row['id'];

 $dbusername=$row['username'];
 $dbpassword=$row['password'];
 
 }
 if($user == $dbusername && $pass == $dbpassword)
 {

 $_SESSION['role']=$role;
 // print_r($_SESSION['role']);die();
 $_SESSION['sess_user']=$user;
$_SESSION['id'] = $userid;
$_SESSION['name']=$name;
$_SESSION['email']=$email;
// print_r($_SESSION['name']);die();
 header("Location:view_all_client.php");
 }
 }
 else
 {
  echo "<script> alert('Invalid username or password'); window.location.href='login.php'; </script>";

 
 }
 }
 else
 {
  echo "<script> alert('Please enter username and password'); window.location.href='login.php'; </script>";
 }

                 
                }
                ?>

      <!-- /.social-auth-links -->

      <p class="mb-1">
        <!-- <a href="forgot-password.html">I forgot my password</a> -->
      </p>
      <p class="mb-0">
        <!-- <a href="register.html" class="text-center">Register a new membership</a> -->
      </p>
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>

</body>

</html>
