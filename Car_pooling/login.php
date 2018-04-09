<?php
    include 'include.php';
    $email = $_POST["email"];
    $pass = md5($_POST["Pass"]);
    $tipo = $_POST['qwerty'];
    
    try{ 
      if($tipo == 'passeggero')
      {
          $q = $dbh->prepare("SELECT idPassegero, email, password FROM passeggeri;");
            if($q->execute())
             {
               while($row = $q->fetch())
                {
                  if($row['email'] == $email && $row['password'] == $pass)
                    {
                      session_start();
                      $_SESSION["idPasseggero"] = $idPasseggero;
                      $_SESSION["user"] = $email;
                      $_SESSION["password"] = $pass;
                      header('location:dashbord.php');
                    }
                 }
              }        
       }
      else if($tipo == 'autista')
        {
         $q = $dbh->prepare("SELECT idAutista,email,password FROM autisti;"); 
           if($q->execute())
            {
               while($row = $q->fetch())
              {
                 if($row['email'] == $email && $row['password'] == $pass)
                 {
                   session_start();
                   $_SESSION["idAutista"] = $idAutista;
                   $_SESSION["user"] = $email;
                   $_SESSION["password"] = $pass;
                   header('location:dashbord.php');
                 }
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