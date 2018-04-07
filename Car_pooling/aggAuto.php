<?php
include 'include.php';
   $targa = $_POST["Targa"]; 
   $marca = $_POST["Marca"];    
   $modello = $_POST["Modello"]; 
   $cilindrata = $_POST["Cilindrata"];
   $potenza = $_POST["Potenza"];   
  
    try{       
          $q = $dbh->prepare("INSERT INTO auto(targa, marca, modello, cilindrata, potenza)VALUES(:Targa, :Marca, :Modello, :Cilindrata, :Potenza);");
          $q->bindValue(':Targa',  $targa, PDO::PARAM_STR);
          $q->bindValue(':Marca',  $marca, PDO::PARAM_STR);
          $q->bindValue(':Modello', $modello, PDO::PARAM_STR);
          $q->bindValue(':Cilindrata', $cilindrata, PDO::PARAM_STR);
          $q->bindValue(':Potenza', $potenza, PDO::PARAM_STR);
          $q->execute();
          echo " I dati sono stati salvati correttamente ";
          header('location:auto.html')
      }catch(PDOException $ex){
          echo" Dati non inseriti".$ex->getMessage();
}
?>
