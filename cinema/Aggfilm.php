<?php
$nomehost = "mysql:host=localhost;dbname=cinema";   
$nomeuser = "root";
$PASSWORD = "indi1";
try{
$dbh = new PDO($nomehost,$nomeuser,$PASSWORD);
  
  $q = $dbh->prepare("SELECT Nome,Posti,Citta FROM Cinema;"); 
      $q->execute();
      if($q->rowCount() > 0)
      {
        $row[] = $q->fetch();    
      }
     echo json_encode($row);
  
$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch(PDOException $ex)
{
  echo"connection failed ".$ex->getMessage();
}





?>