<?php
        $servername = "localhost";
		$username = "rudraksh";
		$password = "rh6698";
		$databasename="try";

	     

$connect = mysqli_connect($servername, $username, $password,$databasename);
if(isset($_POST["id"]))
{
 $value = mysqli_real_escape_string($connect, $_POST["value"]);
 $query = "UPDATE user SET ".$_POST["column_name"]."='".$value."' WHERE id = '".$_POST["id"]."'";
 if(mysqli_query($connect, $query))
 {
  echo 'Data Updated';
 }
}
?>