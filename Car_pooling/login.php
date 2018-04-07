<?php
session_start();
if(isset($_SESSION["email"]))
  if(isset($_REQUEST["emial"]))
?>

<?php
    include 'include.php';
    echo"correzzione alcuni errori nel login";
    $email = $_REQUEST["email"];
    $pass = $_POST["pass"];
  
    try{
      if( $email == $_POST["email"]  && $pass == $_POST["pass"])
       {     
        $q = $dbh->prepare("SELECT idPasseggero, email, password FROM passeggeri;");
        if($q->execute())
            {
              while($row = $q->fetch())
              {
                $_SESSION["idPasseggero"]=$idPasseggero;
                $_SESSION["user"]=$username;
                $_SESSION["password"]=$pass;
                echo"Loggato come passeggero";
                header('location:dashbord.html');
               }
             }
         }
        else if($email==$_POST["email"] && $pass ==$_POST["pass"])  
        {
            $q = $dbh->prepare("SELECT idAutista,email,password FROM autisti;"); 
             if($q->execute())
              {
                 while($row = $q->fetch())
                {
                  $_SESSION["idAutista"]=$idAutista;
                  $_SESSION["user"]=$username;
                  $_SESSION["password"]=$pass;
                   echo"loggato come autista";
                  header('location:dashbord.html');
               }
            }
        }
      else{
            echo "Email non registrata";
            header('location:login.html');
          }
      }catch(PDOException $ex){
  echo" Login non eseguito".$ex->getMessage();
}
    ?>