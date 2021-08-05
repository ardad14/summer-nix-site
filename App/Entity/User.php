<?php

namespace App\Entity;

class User
{
    private $name;
    private $surname;
    private $age;
    private $phone;
    private $email;
    private $login;
    private $password;

    public function __construct($name, $surname, $age, $phone, $email, $login, $password)
    {
        $this->name = $name;
        $this->surname = $surname;
        $this->age = $age;
        $this->phone = $phone;
        $this->email = $email;
        $this->login = $login;
        $this->password = $password;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getSurname()
    {
        return $this->surname;
    }

    public function getAge()
    {
        return $this->age;
    }

    public function getPhone()
    {
        return $this->phone;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function getLogin()
    {
        return $this->login;
    }

    public function getPassword()
    {
        return $this->password;
    }

}