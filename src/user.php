<?php

class User
{

    private $id;
    private $firstname;
    private $lastname;
    private $email;
    private $password;


    public function __construct($id, $firstname, $lastname, $email, $password)
    {
        $this->id = $id;
        $this->firstname = $firstname;
        $this->lastname = $lastname;
        $this->email = $email;
        $this->password = $password;
    }

    public function getID()
    {
        return $this->id;
    }

    public function setID($id): void
    {
        $this->id = $id;
    }

    public function getFirstName()
    {
        return $this->firstname;
    }

    public function setFirstName($firstname): void
    {
        $this->firstname = $firstname;
    }
    
        public function getLastName()
    {
        return $this->lastname;
    }

    public function setLastName($lastname): void
    {
        $this->lastname = $lastname;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function setEmail($email): void
    {
        $this->email = $email;
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function setPassword($password): void
    {
        $this->password = $password;
    }

}
