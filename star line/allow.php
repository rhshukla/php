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



          $qry1 = "SELECT `Status` FROM `user` WHERE `Enrollment`= '$enroll'"; 
          $run1 = mysqli_query($conn,$qry1);
          $data1 = mysqli_fetch_assoc($run1);

         if($data1['Status'] == 1)
         {
          ?>
             <script>
             alert("already apprroved");
             window.open('adminpanel.php','_self');
             </script>
         <?php

      }
      else
      {
    
		

	    $qry = "UPDATE `user` SET `Status` = 1 WHERE `Enrollment`= '$enroll'";
	    $run = mysqli_query($conn,$qry);
		
		if ($run == true) 
	{
		?>
		<script>alert('user allowed');
		
		</script>
		<?php


			
	}

	else
	{
		?>
		<script>alert('ERROR!!');</script>
		<?php
	}
   }
?>
<CENTER>
<div class="login">
    
 
 <a href="adminpanel.php"><input type="button" value="show data"></a>
 <a href="signup.php"> <input type="button" value="new entry"></a>
  
</div>
<div class="shadow"></div>
</CENTER>

	</body>
	</html>