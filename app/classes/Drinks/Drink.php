<?php

namespace App\Drinks;

class Drink
{
    private $data;
    private $properties = [
        'name', 'amount', 'abarot', 'image', 'id'
    ];

    public function getName()
    {
        return $this->data['name'];
    }

    public function getAmount()
    {
        return $this->data['amount'];
    }

    public function getAbarot()
    {
        return $this->data['abarot'];
    }

    public function getImage()
    {
        return $this->data['image'];
    }

    public function setName(string $name)
    {
        $this->data['name'] = $name;
    }

    public function setAmount(int $amount_ml)
    {
        $this->data['amount'] = $amount_ml;
    }

    public function setAbarot(float $abarot)
    {
        $this->data['abarot'] = $abarot;
    }

    public function setImage(string $url)
    {
        $this->data['image'] = $url;
    }


    public function setData($data)
    {
        foreach ($this->properties as $property) {
            if (isset($data[$property])) {
                $value = $data[$property];
                $setter = str_replace('_', '', 'set' . $property);
                $this->{$setter}($value);
            }
        }
//        $this->setName($data['name']);
//        $this->setAmount($data['amount']);
//        $this->setAbarot($data['abarot']);
//        $this->setImage($data['image']);
    }

    public function getData()
    {
        $data = [];
        foreach ($this->properties as $property) {
            $getter = str_replace('_', '', 'get' . $property);
            $data[$property] = $this->{$getter}();
        }
        return $data;
    }

    public function __construct(array $data = null)
    {
        if (!$data){
            $this->setData($data);
        }
    }

    public function setId(int $id){
        $this->data['id'] = $id;
    }

    public function getId(){
        return $this->data['id'];
    }
}