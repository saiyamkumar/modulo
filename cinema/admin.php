<?php
$nomehost = "mysql:host=localhost;dbname=Carpooling";   
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

     $user = $_POST["User"]; 
     $pass = $_POST["Pass"]; 
      
      try{       
          $q = $dbh->prepare("select username, password from Admin where username = :user and password=:pass ;");
          $q->bindValue(':user',  $user, PDO::PARAM_STR);
          $q->bindValue(':pass',  $pass, PDO::PARAM_STR);
          $q->execute(); 
      }catch(PDOException $ex){
          echo" Dati non inseriti".$ex->getMessage();
    


 ?>
  