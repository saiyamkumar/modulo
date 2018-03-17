<?php
$nomehost = "mysql:host=localhost;dbname=modulo";   
$nomeuser = "root";
$PASSWORD = "indi1";
try{
$dbh = new PDO($nomehost,$nomeuser,$PASSWORD);
$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch(PDOException $ex)
{
  echo"connection failed ".$ex->getMessage();
}
?>