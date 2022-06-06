<?php

class Message 

{
    public DateTime $Timestamp;
    public string $Content;


    function __construct(DateTime $timestamp, string $content) {
        $this->Timestamp = $timestamp;
        $this->Content = $content;
    }

    public function SendMessage(string $message) :? void
    {
    }
}