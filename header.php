 <?php
 ob_start();
$eid=$_SESSION['id'];
$name=$_SESSION['name'];

?>


 
<?php if($_SESSION['id'])
   {
   ?>
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
      <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
   
    </ul>

  
         <div class="collapse navbar-collapse" id="navigation">
            <ul class="navbar-nav ml-auto">
            
       
              <li class="dropdown nav-item">
                <a href="#" data-toggle="dropdown">
                   <?php
                    include 'dbconnect.php';
                    // $count=1;
                     $squery = "select * from user where id='$eid'";
                    $result = mysqli_query($conn,$squery);
                     while( $row = mysqli_fetch_array($result))
                        {
                         
                          
                    ?>
                  <div class="photo">
                       <?php if($row['image']=="")
                  {
                    ?>
                     <img src="img/dummy.png" alt="User Avatar" class="img-size-50 mr-3 img-circle">
                     <?php } else { ?>
                    <img src="img/<?php echo $row['image'];?>" alt="User Avatar" class="img-size-50 mr-3 img-circle">
                  <?php } ?>
                  </div>
                <?php } ?>
                  <b class="caret d-none d-lg-block d-xl-block"></b>
                  <p class="d-lg-none">
                    Log out
                  </p>
                </a>
                <ul class="dropdown-menu dropdown-navbar">
                  <!--<li> -->
                  <!--<a href="userprofile.php?id=<?php echo $eid?>" class="nav-item dropdown-item">Profile</a>  </li>      -->
                  <li>

                   <?php //echo $_SESSION['name']; ?>
                   <a href="logout.php" class="nav-item dropdown-item">Log out</a></li>
                </ul>
              </li>
              <li class="separator d-lg-none"></li>
            </ul>
          </div>
  

  </nav>


 <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
     <!--  <img src="img/logo.png" alt="Excellent Care Business Solutions" class="brand-image img-circle elevation-3"
           style="opacity: .8"> -->
      <span class="brand-text font-weight-light">Test</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
         <?php
                    include 'dbconnect.php';
                    // $count=1;
                     $squery = "select * from user where id='$eid'";
                    $result = mysqli_query($conn,$squery);
                     while( $row = mysqli_fetch_array($result))
                        {
                         
                          
                    ?>
        <div class="image">
                <?php if($row['image']=="")
                  {
                    ?>
                     <img src="img/dummy.png" alt="User Avatar" class="img-size-50 mr-3 img-circle">
                     <?php } else { ?>
                    <img src="img/<?php echo $row['image'];?>" alt="User Avatar" class="img-size-50 mr-3 img-circle">
                  <?php } ?>
        </div>
      <?php } ?>
        <div class="info">
          <a href="#" class="d-block"><?php echo $_SESSION['name'];?></a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

             <li class="nav-item">
                <a href="view_all_client.php" class="nav-link">
                  <i class="nav-icon fas fa-users"></i>
                  <p>Manage User</p>
                </a>
              </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
<?php } ?>

