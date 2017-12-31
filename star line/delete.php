<html>
<head>
<link rel="stylesheet" href="delete.css"></link>
</head>

<body>
	<?php
		$servername = "localhost";
		$username = "rudraksh";
		$password = "rh6698";
		$databasename="try";
       
        $conn = mysqli_connect($servername, $username, $password,$databasename);

        $a=$_GET['en'];

        if(is_null($a))
        {
        	$enroll=$_REQUEST['sid'];
        }
        else
        {
              $enroll=$a;
        }

		

	    $qry = "DELETE FROM `user` WHERE Enrollment='$enroll'";
	    $run = mysqli_query($conn,$qry);
		
		if ($run == true) 
	{
		?>
		<script>alert('Data Deleted Successfully');
		
		</script>
		<?php


			
	}

	else
	{
		?>
		<script>alert('ERROR!!');</script>
		<?php
	}
?>
<CENTER>
<div class="login">
    
 
 <a href="entry.php"><input type="button" value="show data"></a>
 <a href="signup.php"> <input type="button" value="new entry"></a>
  
</div>
<div class="shadow"></div>
</CENTER>

	</body>
	</html>