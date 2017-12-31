<?php
    

    // mysql database connection details
    
     $servername = "localhost";
    $username = "rudraksh";
    $password = "rh6698";
    $databasename="try";
   
       

    $connection = mysqli_connect($servername, $username, $password,$databasename);

    // fetch mysql table rows

        $a=$_GET['en'];

        if(is_null($a))
        {
            $enroll=$_REQUEST['sid'];
        }
        else
        {
              $enroll=$a;
        }

    if(is_null($enroll))
    {
          $csv_filename="all";
    }
    else
    {
        $csv_filename=$enroll;
    }



   
    header("Content-type: text/x-csv");
    header("Content-Disposition: attachment; filename=".$csv_filename.".csv");

    if(is_null($enroll))
    {
        $sql = "select * from user ";
    }
    else
    {
        $sql = "select * from user where  Enrollment='$enroll'";
    }

    

    $result = mysqli_query($connection, $sql) or die("Selection Error " . mysqli_error($connection));


    $fp = fopen('php://output', 'w');
    fputcsv($fp, array('Enrollment' , 'First Name','Last Name','Email','password'));

    while($row = mysqli_fetch_assoc($result))
    {
        fputcsv($fp, $row);
    }
    
    fclose($fp);

    //close the db connection
    mysqli_close($connection);
?>