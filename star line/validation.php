<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Document</title>
  <link href="https://bootswatch.com/yeti/bootstrap.min.css" rel="stylesheet">
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
        $usernamelast=$conn->real_escape_string($_POST['secondname']);
        $email=$conn->real_escape_string($_POST['email']);
        $password=$conn->real_escape_string($_POST['password']);
        $conpass=$conn->real_escape_string($_POST['Conform']);
        $gender=$conn->real_escape_string($_POST['gender']);
        $enroll=$_POST['enrollment'];



      if($_POST['Password'] == $_POST['Conform'])
      {   

          $sql = "INSERT INTO `user` (`Enrollment`,`First Name`, `Last Name`, `Email`,`password`,`gender`) VALUES
                ('$enroll','$firstname', '$usernamelast', '$email','$password','$gender')";

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
  
  <div class="container well" style="margin-top: 50px">
    <form id="register-form" method="post" id="form">
      <fieldset>
        <legend>Sign up </legend>
      </fieldset>
      <p>Create a login</p>

      <div class="form-group col-md-12">
        <input class="form-control" name="email" placeholder="Email address" type="email">
      </div>
      <div class="form-group col-md-6">
        <input class="form-control" name="password" id="password" placeholder="Password" type="password">
      </div>
      <div class="form-group col-md-6">
        <input class="form-control" name="password2" placeholder="Re-enter password" type="password">
      </div>
      <div class="clearfix">
      </div>
     
      <div class="form-group col-md-6">
        <input class="form-control" name="firstName" placeholder="First name" type="text">
      </div>
     <div class="form-group col-md-6">
       <input class="form-control" name="secondName" placeholder="Last name" type="text">
     </div>

    
      <div>
        <input class="btn btn-primary" id="submit-button" type="submit" value="Sign Up">
      </div>

    </form>
  </div>

  <script src="http://ajax.aspnetcdn.com/ajax/jQuery/jquery-2.1.3.min.js"></script>
  <script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.13.0/jquery.validate.min.js"></script>
  <script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.13.0/additional-methods.min.js"></script>
  <script src="validation.js"></script>

</body>
</html>