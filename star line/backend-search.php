<?php
//fetch.php
    $servername = "localhost";
    $username = "rudraksh";
    $password = "rh6698";
    $databasename="try";
    
    $conn = mysqli_connect($servername, $username, $password,$databasename);
    $output = '';

if(isset($_POST["query"]))
{
 $search = mysqli_real_escape_string($conn, $_POST["query"]);
 $query = "
  SELECT * FROM user 
  WHERE Email LIKE '%".$search."%'" or die($conn->error);
}
else
{
 $query = "
  SELECT * FROM user ORDER BY Enrollment;
 ";
}

 $result=$conn->query($query);
   





if(1 > 0)
{
 $output .= '
  <div class="table-responsive">
   <table class="table table bordered">
    <tr>
     <th>Emaill</th>
     <th>name</th>
     <th>sir name</th>
    <
    </tr>
 ';
 while( $row = $result->fetch_assoc())
 {
  $output .= '
   <tr>
    <td>'.$row["Email"].'</td>
    <td>'.$row["First Name"].'</td>
    <td>'.$row["Last Name"].'</td>
    
   </tr>
  ';
 }
 echo $output;
}
else
{
 echo 'Data Not Found';
}

?>