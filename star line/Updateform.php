<html>

<head>
	<title>Update Form</title>
	<link rel="stylesheet" href="signup.css"></link>
	<script type="text/javascript" href="model.js"></script>
  <link rel="stylesheet" href="delete.css"></link>

	<style type="text/css">
		input[type=text], select {
    width: 100%;
    padding: 12px 20px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;

}


input[type=number], select {
    width: 100%;
    padding: 12px 20px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
	</style>

<body>
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
        	$enrollm=$_REQUEST['sid'];
        }
        else
        {
              $enrollm=$a;
        }

		

	    $qry = "SELECT * FROM `user` WHERE Enrollment='$enrollm'";
	    $run = mysqli_query($conn,$qry);
	    
	    $data = mysqli_fetch_row($run);

       $qryi = "DELETE FROM `user` WHERE Enrollment='$enrollm'";
      $runi = mysqli_query($conn,$qryi);
    



    ?>

	<h1 align="center">Sing up
	</h1>
	<form method="post">
		<div>
			<label for="enter enroll">enrollment</label>
            <input type="number" id="enrollment" name="enrollment" value=<?php echo $data[0] ?> >
            
		</div>
		<div>
			<label for="fname">First Name</label>
            <input type="text" id="fname" name="firstname" value=<?php echo $data[1] ?>>
		</div>
		<br>
		<div>
			<label for="name">Last Name:</label>
			<input type="text" name="Name" id="Last name" value=<?php echo $data[2] ?>>
		</div>

		<br>
		<div>
			<label for="gender">Gender:</label>
			<input type="radio" id="gender"  name="gender"  value="Male">Male
			<input type="radio" id="gender" name="gender"  value="female">female
		</div>
		<br>
		<div>
			Birthday:
  			<input type="date"  id="birthdate" name="Birthday" max="1998-01-01">
  		</div>

        <br>
  		<div>
  			Email:
  			<input type="Email" id="email" name="Email" value=<?php echo $data[3] ?>>

  		</div>
        <br>
  		<div>
  			Enter Password:
  			<input type="Password" name="Password" id="password" value=<?php echo $data[4] ?>>
  			
  		</div>
  		<br>
  		<div>
  			Conform Password:
  			<input type="Password" name="Conform" value=<?php echo $data[4] ?>>
  		</div>
  		<br>
  		
  		<input type="submit" value="Submit">

  		

	</form>


		
			
			
			
		


<?php

    

    if($_SERVER['REQUEST_METHOD']=='POST')
		 {
		 	
		 		$firstname=$conn->real_escape_string($_POST['firstname']);
		 		$usernamelast=$conn->real_escape_string($_POST['Name']);
		 		$email=$conn->real_escape_string($_POST['Email']);
		 		$password=$conn->real_escape_string($_POST['Password']);
		 		$conpass=$conn->real_escape_string($_POST['Conform']);
		 		$gender=$conn->real_escape_string($_POST['gender']);
		 		$enroll=$_POST['enrollment'];



		 	if($_POST['Password'] == $_POST['Conform'])
		 	{		

		 		        $sql = "INSERT INTO `user` (`Enrollment`,`First Name`, `Last Name`, `Email`,`password`,`gender`) VALUES
                ('$enroll','$firstname', '$usernamelast', '$email','$password','$gender')";

          		 if($conn->query($sql)===True)
           		 {
           			?>
              <script type="text/javascript">alert("Updated successfully");</script>
              <?php
          		 }
          		 else
          		 {
          		 	 echo "Error: " . $sql . "<br>" . $conn->error;
           		 }
           	}

           	else
           	{
           		?>
           		<script type="text/javascript">alert("password not match");</script>
           		<?php
           		
           	}

		 	
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