<?php
session_start();
include 'Database.php';
if(isset($_POST['submit'])){
    
    $mdp = $_POST['Mot_de_passe'];
    //Call connexion
    $rqt = "CALL `PepitLeague`.`Connexion`(:mail);";

    try
    {
        $query = $db->prepare($rqt);
        $query->bindParam(':mail',$_POST['email'],PDO::PARAM_STR, 45);
        $query->execute();

        echo resultRqt($query,$mdp);
    }
    catch (PDOException $e)
    {
        echo '<script> console.log("%c Une erreur est survenue. Code erreur : '.$e->getCode().'","color:red;") </script>';
    }
    $query->closeCursor();
}



function resultRqt($q,$m){
    //If there is a reslut, we can go further into the connection
    if ($q->rowCount() > 0) {
        foreach($q as $row){
            //Verify the password
            if(password_verify($m,$row['password']) == 1){
                //If password is ok, then sore all informations
                $_SESSION['id'] = $row['id'];
                $_SESSION['$firstname'] = $row['firstname'];
                $_SESSION['$lastname'] = $row['lastname'];
                $_SESSION['$email'] = $row['email'];
                $_SESSION['$updated_at'] = $row['updated_at'];
                $_SESSION['$created_at'] = $row['created_at'];
                $q->closeCursor();

                echo "{'auth'='succeed'}";
            }
            echo "{'auth'='error','error'='Login ou mot de passe incorrect'}";
        }
    } else {
        echo "{'auth'='error','error'='Login ou mot de passe incorrect'}";
    }
}


?>