<?php
session_start();
if(isset($_SESSION['User']))
{
echo "sei loggato come ".$_SESSION['User'];
  header("location: ModificaAdmin.html");
  $bool = true;
}
else{
  echo"non sei loggato";
  $bool=false;
}
?>