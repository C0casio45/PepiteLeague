<?php

class Database
{
    private $servername = 'localhost';
    private $username = 'admin';
    private $password = '';
    
    function get_servername(){return $this->servername;}
    function get_username(){return $this->username;}
    function get_password(){return $this->password;}

    function connect()
    {
        $conn = new mysqli(get_servername(), get_username(), get_password());
        if ($conn->connect_error)
        {
            die("Connection failed: " . $conn->connect_error);
        }
        echo "Connected successfully";
    }
}

$database = new Database();
$database->connect();