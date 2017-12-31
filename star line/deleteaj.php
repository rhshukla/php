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

  <form method="POST">
 
    
   
<?php

     $servername = "localhost";
    $username = "rudraksh";
    $password = "rh6698";
    $databasename="try";
    
       

     $conn = mysqli_connect($servername, $username, $password,$databasename);
  

     $result="SELECT * FROM user";

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
       </tr>

     
<?php
      
      while($aj =mysqli_fetch_row($data))

      {
          
        print"<tr><td>";
        echo $aj[0];
        print"</td><td>";
        echo $aj[1];
        print"</td><td>";
        echo $aj[2];
        print"</td><td>";
        echo $aj[3];
        print"</td><td>";
        echo $aj[5];
        //print"</td><td> <a href="#">Delte</a>";
        //print"</td><td><button>Update</button>";
        ?>
      </td><td>
       <button id="<?php echo $aj[0]; ?>" class="delbutton"> button </button>

      </td><td>
       
          
        <?php
        
        print"</td></tr>";
     
     }
?>
 <div class="login">
    
 
 <a href="Update.php"><input type="button" value="update data"></a>
 <a href="signup.php"> <input type="button" value="new entry"></a>
 <a href="logout.php"> <input type="button" value="logout"></a>

  
</div>
 



  


<?php
}
else
{
  echo "<script> alert('login First')
  window.location='login.php'</script>";
}
?>

<script
  src="https://code.jquery.com/jquery-3.2.1.min.js"
  integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
  crossorigin="anonymous"></script>
<script type="text/javascript" >
        $(document).ready(function() {

            $(".delbutton").click(function() {
                var del_id = $(this).attr("id");
                var info = 'id=' + del_id;
                if (confirm("Sure you want to delete this post? This cannot be undone later."+del_id)) {
                    $.ajax({
                        type : "POST",
                        url : "header.php", //URL to the delete php script
                        data : {info:del_id},
                        success : function() {
                        }
                    });
                   $(this).parent().parent().fadeOut(300,function(){
                      $(this).remove();
                    },);
                }
                return false;
            });
        });
 </script>
</body>
</html>


