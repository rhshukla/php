<?php
session_start();
 if(isset($_SESSION["uid"]))
 {
   
?>
<html>
<head>
	<title> Your information</title>
  <link rel="stylesheet" href="delete.css"></link>
	<style>
table {
    border-collapse: collapse;
    width: 100%;
}

th, td {
    text-align: left;
    padding: 8px;
}

tr:nth-child(even){background-color: #f2f2f2}

th {
    background-color: #4CAF50;
    color: white;
}
</style>


</head>
	
<body>

  <form method="POST" action="">
 
    
   
<?php

     $servername = "localhost";
		$username = "rudraksh";
		$password = "rh6698";
		$databasename="try";
    
	     

		 $conn = mysqli_connect($servername, $username, $password,$databasename);

     $id2=($_SESSION["uid"]);
  

		 $result="SELECT * FROM `user` WHERE `Status`=1 AND `Enrollment`='$id2' ";

		 $data=mysqli_query($conn,$result);

     



?>

		 <table border="2">
		 
		 	<tr>
		 	  <th>Enrollment</th>
		 	  <th>First Name</th>
		 	  <th>Last Name</th>
		 	  <th>Email</th>
		 	  <th>gender</th>
		 	  <th>Delete</th>
		 	  <th>Update</th>
        <th>photo</th>
		 	 </tr>

		 
<?php
      
      while($a =mysqli_fetch_row($data))

      {
          
      	print"<tr><td>";
      	echo $a[0];
        

      	print"</td><td>";
      	echo $a[1];
      	print"</td><td>";
      	echo $a[2];
      	print"</td><td>";
      	echo $a[3];
      	print"</td><td>";
      	echo $a[5];
      	//print"</td><td> <a href="#">Delte</a>";
      	//print"</td><td><button>Update</button>";
      	?>
      </td><td>
      	<a href="delete.php?sid=<?php echo $a[0]; ?> ">Delete</a>
      </td><td>
          <a href="csv.php?sid=<?php echo $a[0]; ?> ">Print</a>
      </td><td>
        <img src="uploads/<?php echo $a[7]; ?>" alt="<?php echo $a[1]; ?>" width="70" height="60" />
       
      	  
      	<?php
      	
      	print"</td></tr>";
     
     }
?>
 <div class="login">
    
 
 <a href="Update.php"><input type="button" value="update data"></a>
 <a href="signup.php"> <input type="button" value="new entry"></a>
 <a href="csv.php"> <input type="button" value="print database"></a>
 <a href="logout.php"> <input type="button" value="logout"></a>

  
</div><br>
<br>
 



	


<?php

        
}
else
{
  echo "<script> alert('login First')
  window.location='login.php'</script>";
}
?>
</body>
</html>


