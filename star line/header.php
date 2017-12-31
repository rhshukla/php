<?php
 $servername = "localhost";
    $username = "rudraksh";
    $password = "rh6698";
    $databasename="try";
    
       

     $conn = mysqli_connect($servername, $username, $password,$databasename);
$id=$_POST['info'];
$delete =  "DELETE FROM user WHERE Enrollment='$id' ";

$result = mysqli_query($conn,$delete) or die(mysqli_error());
?>