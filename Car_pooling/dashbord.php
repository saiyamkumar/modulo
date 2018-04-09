<?php
session_start();
if(isset($_SESSION['user']))
{
echo "sei loggato come ".$_SESSION['user'];
  $bool = true;
}
else{
  echo"non sei loggato";
  $bool=false;
}



?>