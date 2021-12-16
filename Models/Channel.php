<?php
include 'Messages.php';
include 'User.php';

class Channel 
{
    public Array $Messages;
    public Array $Users;

    function __construct(object $user) 
    {
        array_push($Users, $user);
    }

    public function SendMessage(string $message) :? void
    {
        $_message = new Message($_SERVER['REQUEST_TIME'], $message);
        array_push($Messages, $_message);
    }
}