<?php
  session_start();

  unset($_SESSION["uid"]);

  session_destroy();

  echo "<script>
         alert('logout successfully')
         window.location='login.php';
         </script>";
?>