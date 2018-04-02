<?php
include 'include.php';

   $cognome = $_POST["Cog"]; 
   $nome = $_POST["Nome"];    
   $sesso = $_POST["sesso"]; 
   $nazionalita = $_POST["nazione"];
   $email = $_POST["email"];   
   $pass = $_POST["pass"];
   $Tel=$_POST["tel"];
   $data=$_POST["data"];
   $bool=true;
   try{
      $q = $dbh->prepare("SELECT Email FROM passeggeri;");
      if($q->execute())
      {
        while($row = $q->fetch())
        {
           if($_POST["email"] == $email)
            {
              $msg = "Email esistente ";
              $bool=false;
            } 
        } 
      } 
    }catch(PDOException $ex)
    {
      echo $ex->getMessage();
    }
    try{
  echo $cognome ;
      echo"<br>";
  echo $nome ;   echo"<br>";
  echo $sesso ;echo"<br>";
  echo $nazionalita; echo"<br>";
  echo $email ;   echo"<br>";
  echo $pass ;echo"<br>";
  echo $Tel;echo"<br>";
  echo $data;echo"<br>";
      
$q = $dbh->prepare("INSERT INTO passeggeri(cognome, nome, email, password, telefono, data_nascita, sesso, nazionalita)VALUES(:cognome, :nome, :email, :password, :Tel, :data, :sesso, :nazionalita);");
$q->bindValue(':cognome', $cognome, PDO::PARAM_STR);
$q->bindValue(':nome', $nome, PDO::PARAM_STR);
$q->bindValue(':email', $email, PDO::PARAM_STR);
$q->bindValue(':password', $pass, PDO::PARAM_STR);
$q->bindValue(':Tel', $Tel, PDO::PARAM_STR);
$q->bindValue(':data', $data, PDO::PARAM_STR);
$q->bindValue(':sesso', $sesso, PDO::PARAM_STR);
$q->bindValue(':nazionalita', $nazionalita, PDO::PARAM_STR);
$q->execute();
echo " I dati sono stati salvati correttamente ";
}catch(PDOException $ex){
  echo" Dati non inseriti".$ex->getMessage();
}
?>
