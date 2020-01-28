<?php

namespace App\Drinks;

use App\App;

class Drink extends \App\DataHolder
{
    protected $properties = [
        'name', 'amount', 'abarot', 'image', 'id', 'price', 'in_stock'
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

    public function setPrice(float $price)
    {
        $this->data['price'] = $price;
    }

    public function getPrice()
    {
        return $this->data['price'];
    }

    public function setInStock(int $in_stock)
    {
        $this->data['in_stock'] = $in_stock;
    }

    public function getInStock()
    {
        return $this->data['in_stock'];
    }
}