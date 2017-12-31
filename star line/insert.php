<?php
    $servername = "localhost";
		$username = "rudraksh";
		$password = "rh6698";
		$databasename="try";

	     

$connect = mysqli_connect($servername, $username, $password,$databasename);
if(isset($_POST["first_name"], $_POST["last_name"]))
{
 $first_name = mysqli_real_escape_string($connect, $_POST["first_name"]);
 $last_name = mysqli_real_escape_string($connect, $_POST["last_name"]);
 $query = "INSERT INTO user(first_name, last_name) VALUES('$First Name', '$Last_Name')";
 if(mysqli_query($connect, $query))
 {
  echo 'Data Inserted';
 }
}
?>