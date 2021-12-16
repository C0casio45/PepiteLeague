<?php
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

        echo resultRqt($query,$mdp,$db);
    }
    catch (PDOException $e)
    {
        echo '<script> console.log("%c Une erreur est survenue. Code erreur : '.$e->getCode().'","color:red;") </script>';
    }
    $query->closeCursor();
}



function resultRqt($q,$m,$db){
    //If there is a reslut, we can go further into the connection
    if ($q->rowCount() > 0) {
        foreach($q as $row){
            //Verify the password
            if(password_verify($m,$row['password']) == 1){
                //If password is ok, then sore all informations
                $id = $row['idUsers'];
                $firstname = $row['firstname'];
                $lastname = $row['lastname'];
                $email = $row['email'];
                $password = $row['password'];
                $updated_at = $row['updated_at'];
                $created_at = $row['created_at'];
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