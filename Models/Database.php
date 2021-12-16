<?php

class Database
{
    private $servername = 'localhost';
    private $username = 'root';
    private $password = '';
    private $connection;

    function __construct()
    {    
        try 
        {
            $this->connection = new PDO("mysql:host=$this->servername;dbname=webchat", $this->username, $this->password);
            // set the PDO error mode to exception
            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }
        catch(PDOException $e) 
        {
            echo "Connection failed: " . $e->getMessage();
        }
    }

    function getAllUsers()
    {
        $querry = $this->connection->prepare("SELECT * FROM users;");
        $querry->execute();
    }

    function getAllChannels()
    {
        $querry = $this->connection->prepare("SELECT * FROM channels;");
        $querry->execute();
    }

    function getAllUsersInChannels()
    {
        $querry = $this->connection->prepare("SELECT * FROM channels_users;");
        $querry->execute();
    }

    function getUserFromMail($mail)
    {
        $querry = $this->connection->prepare('SELECT * FROM users WHERE email  = mail');
        $querry->bind_param("s", $mail);
        $querry->execute();
    }
}

$database = new Database;
$database->getAllUsers();