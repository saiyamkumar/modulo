<?php
session_start();
if(isset($_SESSION['user']))
{
echo "sei loggato come ".$_SESSION['user'];
  header("location: aggAuto.php");
  $bool = true;
}
else{
  echo"non sei loggato";
  $bool=false;
}



?>