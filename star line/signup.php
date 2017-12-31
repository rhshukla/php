<html>

<head>
	<title>Signup Form</title>
	<link rel="stylesheet" href="signup.css"></link>
	<script type="text/javascript" href="model.js"></script>

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
<script src="http://ajax.aspnetcdn.com/ajax/jQuery/jquery-2.1.3.min.js"></script>
  <script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.13.0/jquery.validate.min.js"></script>
  <script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.13.0/additional-methods.min.js"></script>
  <script src="validation.js"></script>


</head>

<body>
	<?php
	  
       $servername = "localhost";
		$username = "rudraksh";
		$password = "rh6698";
		$databasename="try";

	     

		 $conn = mysqli_connect($servername, $username, $password,$databasename);

		 if($_SERVER['REQUEST_METHOD']=='POST')
		 {
		 	
		 		$firstname=$conn->real_escape_string($_POST['firstname']);
		 		$usernamelast=$conn->real_escape_string($_POST['Name']);
		 		$email=$conn->real_escape_string($_POST['Email']);
		 		$password=$conn->real_escape_string($_POST['Password']);
		 		$conpass=$conn->real_escape_string($_POST['Conform']);
		 		$gender=$conn->real_escape_string($_POST['gender']);
		 		$enroll=$_POST['enrollment'];




$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
}
// Check if file already exists
if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
}
// Check file size

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}

 $profile=$_FILES["fileToUpload"]["name"];
          

		 	if($_POST['Password'] == $_POST['Conform'])
		 	{		

		 			$sql = "INSERT INTO `user` (`Enrollment`,`First Name`, `Last Name`, `Email`,`password`,`gender`,`photo`) VALUES
            		('$enroll','$firstname', '$usernamelast', '$email','$password','$gender','$profile')";

          		 if($conn->query($sql)===True)
           		 {
           			echo "New record created ";
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

	<h1 align="center">Sing up
	</h1>
	<form method="post" id="form" enctype="multipart/form-data">
		<div>
			<label for="enter enroll">enrollment</label>
            <input type="number" id="enrollment" name="enrollment" placeholder="enrollment">
             <span class="error" id="enrollment"></span>
		</div>
		<div>
			<label for="fname">First Name</label>
            <input type="text" id="fname" name="firstname" placeholder="Your name..">
            <span class="error" id="firstname"></span>
		</div>
		<br>
		<div>
			<label for="name">Last Name:</label>
			<input type="text" name="Name" id="Last name" placeholder="Your Last name..">
			<span class="error" id="lastname"></span>
		</div>

		<br>
		<div>
			<label for="gender">Gender:</label>
			<input type="radio" id="gender"  name="gender"  value="male" checked>Male
			<input type="radio" id="gender" name="gender"  value="female">female
		</div>
		<br>
		<div>
			Birthday:
  			<input type="date"  id="birthdate" name="Birthday" max="1998-01-01">
  			 <span class="error" id="date"></span>
  		</div>

        <br>
  		<div>
  			Email:
  			<input type="Email" class="form-control" name="Email" id="email" placeholder="Enter Email">
  			 <span class="error" id="email"></span>

  		</div>
        <br>
  		<div>
  			Enter Password:
  			<input type="Password" name="Password" id="password" placeholder="Enter Password">
  			 <span class="error" id="password"></span>
  			
  		</div>
  		<br>
  		<div>
  			Conform Password:
  			<input type="Password" name="Conform" placeholder="Conform Password" >
  			 <span class="error" id="cpass"></span>
  		</div>
  		<br>
      <div>
        Select image to upload:
    <input type="file" name="fileToUpload" id="fileToUpload">
  </div>
    
  <br>
  <div>
     <form method="POST">
      <input type="file" name="file" />
     <input type="submit" name="submit">
     </form>
</div>
  		
  		<input type="submit" value="Submit">

  		

	</form>


		
			
			
			
		

</body>
</html>