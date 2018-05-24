<?php
$nomehost = "mysql:host=localhost;dbname=cinema";   
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
        
        $q = $dbh->prepare("SELECT idAdmin, username, password FROM Admin;");
            if($q->execute())
             {
               while($row = $q->fetch())
                {
                  if($row['username'] == $user && $row['password'] == $pass)
                    {
                      session_start();
                      $_SESSION["idAdmin"] = $idAdmin;
                      $_SESSION["User"] = $user;
                      $_SESSION["Pass"] = $pass;
                      
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
                    }
                 }
              }
          else{
            echo"Dati non inseriti";
            header("location:admin.html");
          }
      }catch(PDOException $ex){
          echo" Dati non inseriti".$ex->getMessage();
      }
 ?>