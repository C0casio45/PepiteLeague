<?php

$dsn = "mysql:host=192.168.1.34; dbname=PepitLeague";
$user = "public";
$mdp = "s329y6r5";

try
{
    $db = new PDO($dsn, $user, $mdp);
}
catch (PDOException $e)
{
    echo "{'result'='error','errorMessage'='$e->getCode()'}";
}

?>