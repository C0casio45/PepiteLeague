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

    function executeQuerry($querry)
    {
       $this->connection->prepare($querry);
       echo("wsh");
    }

    function getAllUsers()
    {
        return ($this->executeQuerry("SELECT * FROM users;"));
    }

    function getAllChannels()
    {
        return ($this->executeQuerry("SELECT * FROM channels;"));
    }

    function getAllUsersInChannels()
    {
        return ($this->executeQuerry("SELECT * FROM channels_users;"));
    }
}