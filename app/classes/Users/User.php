<?php


namespace App\Users;


class User extends \App\DataHolder
{
    protected $properties = ['id', 'name', 'email', 'password'];

    public function setName($name)
    {
        $this->data['name'] = $name;
    }

    public function getName()
    {
        return $this->data['name'];
    }

    public function setEmail($email)
    {
        $this->data['email'] = $email;
    }

    public function getEmail()
    {
        return $this->data['email'];
    }

    public function setPassword($password)
    {
        $this->data['password'] = $password;
    }

    public function getPassword()
    {
        return $this->data['password'];
    }
}