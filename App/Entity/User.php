<?php

namespace App\Entity;

class User
{
    private $id;
    private $name;
    private $surname;
    private $age;
    private $phone;
    private $email;
    private $login;
    private $password;

    public function __construct($id, $name, $surname, $age, $phone, $email, $login, $password)
    {
        $this->id = $id;
        $this->name = $name;
        $this->surname = $surname;
        $this->age = $age;
        $this->phone = $phone;
        $this->email = $email;
        $this->login = $login;
        $this->password = $password;
    }

    public function getId()
    {
        return $this->id;
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