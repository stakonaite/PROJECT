<?php

namespace App\Users;

class User
{

    private $data = [];

    public function __construct($data = null)
    {
        if ($data) {
            $this->setData($data);
        } else {
            $this->data = [
                'id' => null,
                'email' => null,
                'name' => null,
                'surname' => null,
                'password' => null,
                'phone' => null,
            ];
        }
    }

    public function setData($array)
    {
        if (isset($array['id'])) {
            $this->setId($array['id']);
        } else {
            $this->data['id'] = null;
        }

        $this->setEmail($array['email'] ?? null);
        $this->setPassword($array['password'] ?? null);
        $this->setName($array['name'] ?? null);
        $this->setSurname($array['surname'] ?? null);
        $this->setPhone($array['phone'] ?? null);
    }

    public function getData()
    {
        return [
            'id' => $this->getId(),
            'email' => $this->getEmail(),
            'password' => $this->getPassword(),
            'name' => $this->getName(),
            'surname' => $this->getSurname(),
            'phone' => $this->getPhone(),
        ];
    }

    public function setId(int $id)
    {
        $this->data['id'] = $id;
    }

    public function getId()
    {
        return $this->data['id'];
    }

    public function setEmail(String $email)
    {
        $this->data['email'] = $email;
    }

    public function setPassword(String $password)
    {
        $this->data['password'] = $password;
    }

    public function getEmail()
    {
        return $this->data['email'];
    }

    public function getPassword()
    {
        return $this->data['password'];
    }

    public function setName($name)
    {
        $this->data['name'] = $name;
    }

    public function getName()
    {
        return $this->data['name'];
    }

    public function setSurname($surname)
    {
        $this->data['surname'] = $surname;
    }

    public function getSurname()
    {
        return $this->data['surname'];
    }

    public function setPhone($phone)
    {
        $this->data['phone'] = $phone;
    }

    public function getPhone()
    {
        return $this->data['phone'];
    }
}
