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
      $q = $dbh->prepare("SELECT Email FROM module;");
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
$q = $dbh->prepare("INSERT INTO module(Cognome, Nome, Sesso, Nazionalita, Patente, Email, Password) VALUES (:cognome, :nome, :sesso, :nazionalita, :PAT, :email, :Pass);");
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
?>
<!DOCTYPE>
<html>
	<head>
	<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>	
		
	</head>
  <body><br>
	<div align="center" class="container" >	
	<div class="panel panel-default">	
		 <div class="panel-heading" style="background-color:orange;"><h1><center> Riepilogo Dati </center></h1></div>
		<br>
	<div class="panel-body">
		<center>  
   <?php
       echo "<p> Cognome: ";       echo $cognome;      echo"</p>"; 
       echo "<p>Nome: ";           echo $nome;         echo "</p>"; 
       echo "<p>Nazionalità: ";    echo $nazionalita;  echo "</p>"; 
       echo "<p>Sesso: ";          echo $sesso;        echo  "</p>"; 
       echo "<p>Cat. Patente: ";   echo $PAT;          echo "</p>"; 
       echo "<p> E-mail: ";        echo $email;        echo "</p>"; 
       echo "<p>Password: ";       echo $pass;         echo  "</p>"; 
    ?>
 </center></div><div class="panel-footer" style="background-color:orange;">
      <form action='esito.html' method='post'>
<input id='Annulla'type='button' value='Annulla'/>
<input id='Conferma' type='submit' value='Conferma'/>
</form>
<script type='text/javascript'>
document.getElementById('Annulla').onclick = function () {
  location.href = 'index.html';
}
      </script></form></center>
			</div> 
    </div>	
	</div>	
	</body>
</html>