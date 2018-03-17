<?php
include 'include.php';

if(isset( $_POST["patenteA"]) && isset( $_POST["patenteB"])) 
{
    $PAT = $_POST["patenteA"].' '.$_POST["patenteB"];
}
else if(isset( $_POST["patenteB"])) 
    {
      $PAT = $_POST["patenteB"];
    }
    else if(isset( $_POST["patenteA"]))
          {
            $PAT = $_POST["patenteA"];
          }
          else
          {
            $PAT = "None";
          }

   $cognome = $_POST["Cog"]; 
   $nome = $_POST["nome"];    
   $sesso = $_POST["sesso"]; 
   $nazionalita = $_POST["nazione"];
   $email = $_POST["email"];   
   $pass = $_POST["Pass"];
   $bool=true;
    try{
      $q = $dbh->prepare("SELECT Email FROM Module");
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
  
   echo "<p>"; echo $cognome;      echo"</p>"; 
   echo "<p>"; echo $nome;         echo "</p>"; 
   echo "<p>"; echo $nazionalita;  echo "</p>"; 
   echo "<p>"; echo $sesso;        echo  "</p>"; 
   echo "<p>"; echo $PAT;          echo "</p>"; 
   echo "<p>"; echo $email;        echo "</p>"; 
   echo "<p>"; echo $pass;         echo  "</p>";  

try{
$q = $dbh->prepare("INSERT INTO Module(Cognome, Nome, Sesso, Nazionalita, Patente, Email, Password) VALUES (:cognome, :nome, :sesso, :nazionalita, :PAT, :email, :Pass);");
$q->bindValue(':cognome', $cognome, PDO::PARAM_STR);
$q->bindValue(':nome', $nome, PDO::PARAM_STR);
$q->bindValue(':sesso', $sesso, PDO::PARAM_STR);
$q->bindValue(':nazionalita', $nazionalita, PDO::PARAM_STR);
$q->bindValue(':PAT', $PAT, PDO::PARAM_STR);
$q->bindValue(':email', $email, PDO::PARAM_STR);
$q->bindValue(':Pass', $pass, PDO::PARAM_STR);
$q->execute(); 
}catch(PDOException $ex){
  echo" Dati non inseriti".$ex->getMessage();
}
echo "<form action='esito.html' method='post'>
<input id='Annulla'type='button' value='Annulla'/>
<input id='Conferma' type='submit' value='Conferma'/>
</form>
<script type='text/javascript'>
document.getElementById('Annulla').onclick = function () {
  location.href = 'index.html';
}
</script>";
?>