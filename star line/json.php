
   
<?php
     $servername = "localhost";
		$username = "rudraksh";
		$password = "rh6698";
		$databasename="try";
    
	  $conn = mysqli_connect($servername, $username, $password,$databasename);

     $a=$_GET['user'];

     if(!is_null($a))
     {
        $result="SELECT * FROM user WHERE `First Name`='$a'";
     }
     else
     {
       $result="SELECT * FROM user";
     }
     
      $data=mysqli_query($conn,$result);
      $b = array();
      
      while($a =mysqli_fetch_row($data))
      {
          $b[] = $a;
      	  
      }
      

     

      

         $json=json_encode($b);
         echo $json;

         ?>

    
 
 

	


