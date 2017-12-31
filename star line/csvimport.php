<?php

       $servername = "localhost";
    $username = "rudraksh";
    $password = "rh6698";
    $databasename="try";

       

     $conn = mysqli_connect($servername, $username, $password,$databasename);

  if(isset($_POST['submit'])){
    if($_FILES['csv_data']['name']){
      
      $arrFileName = explode('.',$_FILES['csv_data']['name']);
      if($arrFileName[1] == 'csv'){
        $handle = fopen($_FILES['csv_data']['tmp_name'], "r");
        while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
           $item1 = mysqli_real_escape_string($conn,$data[0]);
          $item2 = mysqli_real_escape_string($conn,$data[1]);
           $item3 = mysqli_real_escape_string($conn,$data[2]);
            $item4 = mysqli_real_escape_string($conn,$data[3]);
             $item5= mysqli_real_escape_string($conn,$data[4]);
              $item6 = mysqli_real_escape_string($conn,$data[5]);

           $import="INSERT into    `user` (`Enrollment`,`First Name`,`Last Name`,`Email`,`password`,`gender`) values('$item1','$item2','$item3','$item4','$item5','$item6')";
          
          mysqli_query($conn,$import);
        }
        fclose($handle);
        print "Import done";
      }
    }
  }
?>
<html>
  <head>
    <title> SpaceoBloging :: Upload CSV and Insert into Database Using PHP</title>
  <head>
  <body>
    <form method='POST' enctype='multipart/form-data'>
      Upload CSV: <input type='file' name='csv_data' /> <input type='submit' name='submit' value='Upload CSV' />
    </form>
  </body>
</html>