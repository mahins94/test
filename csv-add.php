<?php
  include('dbconnect.php');
// if(isset($_POST["submit"]))
// {
//  if($_FILES['file']['name'])
//  {
//   $filename = explode(".", $_FILES['file']['name']);
//   if($filename[1] == 'csv')
//   {
//    $handle = fopen($_FILES['file']['tmp_name'], "r");
//    while($data = fgetcsv($handle))
//    {
//                 $item0 = mysqli_real_escape_string($conn, $data[0]);  
//                 $item1 = mysqli_real_escape_string($conn, $data[1]);
//                    $item2 = mysqli_real_escape_string($conn, $data[2]);
//                       $item3 = mysqli_real_escape_string($conn, $data[3]);
//                          $item4 = mysqli_real_escape_string($conn, $data[4]);
//                             $item5 = mysqli_real_escape_string($conn, $data[5]);
//                                $item6 = mysqli_real_escape_string($conn, $data[6]);
//                                 $item7 = mysqli_real_escape_string($conn, $data[7]);
//                 mysqli_query($conn,"insert into client(client_name,contact_name,address,pin,city,location,distance,note) values('$item0','$item1','$item2','$item3','$item4','$item5','$item6','$item7')");
//                 // mysqli_query($conn, $query);
//    }
//    fclose($handle);
//    echo "<script>alert('Import done');</script>";
//   }
//  }
// }



if (isset($_POST["import"])) {
    
    $fileName = $_FILES["file"]["tmp_name"];
    
    
    if ($_FILES["file"]["size"] > 0) {
        
        $file = fopen($fileName, "r");
        $c = 0;
    $count =0;
        while (($column = fgetcsv($file, 10000, ",")) !== FALSE) {
            
             $count ++;
            
            $empcode = "";
            if (isset($column[0])) {
                $empcode = mysqli_real_escape_string($conn, $column[0]);

            }
            $empname = "";
            if (isset($column[1])) {
                $empname = mysqli_real_escape_string($conn, $column[1]);

            }
            $dep = "";
            if (isset($column[2])) {
                $dep = mysqli_real_escape_string($conn, $column[2]);
            }
              $age = "";
            if (isset($column[3])) {
                $age = mysqli_real_escape_string($conn, $column[3]);
            }
              $exp = "";
            if (isset($column[4])) {
                $exp = mysqli_real_escape_string($conn, $column[4]);
            }
            $dob = "";
            if (isset($column[5])) {
                $dob = mysqli_real_escape_string($conn, $column[5]);
            }
            $djoin = "";
            if (isset($column[6])) {
                $djoin = mysqli_real_escape_string($conn, $column[6]);
            }

 $checkExistingData = "SELECT * FROM employee WHERE empname='$empname'";
        $resultcheckExistingData = mysqli_query($conn, $checkExistingData);
  $countExistingData = mysqli_num_rows($resultcheckExistingData);     
   if($countExistingData == 0)
            {
          
 mysqli_query($conn,"insert into employee(empcode,empname,dep,age,exp,dob,djoin)
      values ('$empcode','$empname','$dep','$age','$exp','$dob','$djoin')");
 header('Location: view_all_client.php');

}
else
{
    echo "<script> alert('$empname Already exist'); window.location.href='client.php';</script>"; 
}



        }
    }
}

?>