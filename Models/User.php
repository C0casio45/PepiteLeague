<?php

class Users 
{
    public string $FirstName;
    public string $LastName;
    public DateTime $CreationDateTime;
    public DateTime $LastModifiedDateTime;
    public string $Email;
    public string $Password;


    public function __construct(string $firstName, string $lastName,string $creationDateTime, string $lastModifiedDateTime, string $email, string $password) {
        $this->FirstName = $firstName;
        $this->LastName = $lastName;
        $this->CreationDateTime = $creationDateTime;
        $this->LastModifiedDateTime = $lastModifiedDateTime;
        $this->Password = $password;
        $this->Email = $email;
    }
}