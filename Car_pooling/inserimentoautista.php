<?php
include 'include.php';

$Cog=$_POST["C"];
$N=$_POST["N"];
$Nic=$_POST["nic"];
$Email=$_POST["EM"];
$pas=$_POST["P"];
$Tel=$_POST["T"];
$data=$_POST["D"];
$sesso=$_POST["sex"];
$Numero_pat=$_POST["NP"];
$Scad_pat=$_POST["SP"];
$nazionalita=$_POST["nazione"];
$bool=true;

 try{
      $q = $dbh->prepare("SELECT Email FROM autisti;");
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
      echo $Cog; echo"<br>";
      echo $N;   echo"<br>";
      echo $Nic; echo"<br>";
      echo $Email; echo"<br>";
      echo $pas; echo"<br>";
      echo $Tel; echo"<br>";
      echo $data; echo"<br>";
      echo $sesso; echo"<br>";
      echo $Numero_pat; echo"<br>";
      echo $Scad_pat; echo"<br>";
      echo $nazionalita; echo"<br>";   
            
$q = $dbh->prepare("INSERT INTO autisti(cognome, nome, email, password, telefono, data_nascita, sesso, numero_patente, scadenza_patente, nazionalita)VALUES(:Cog, :N, :Email, MD5(:Pas), :Tel, :data, :sesso, :Numero_pat, :Scad_pat, :nazionalita);");
$q->bindValue(':Cog', $Cog, PDO::PARAM_STR);
$q->bindValue(':N', $N, PDO::PARAM_STR);
$q->bindValue(':Email', $Email, PDO::PARAM_STR);
$q->bindValue(':Pas', $pas, PDO::PARAM_STR);
$q->bindValue(':Tel', $Tel, PDO::PARAM_STR);
$q->bindValue(':data', $data, PDO::PARAM_STR);
$q->bindValue(':sesso', $sesso, PDO::PARAM_STR);
$q->bindValue(':Numero_pat', $Numero_pat, PDO::PARAM_STR);
$q->bindValue(':Scad_pat', $Scad_pat, PDO::PARAM_STR);
$q->bindValue(':nazionalita', $nazionalita, PDO::PARAM_STR);
$q->execute();
echo " I dati sono stati salvati correttamente ";
}catch(PDOException $ex){
  echo" Dati non inseriti".$ex->getMessage();
}  

?>