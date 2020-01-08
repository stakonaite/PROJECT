<?php

class Car {

    private $gamintojas;
    private $modelis;

    public function __construct($gamintojas, $modelis)
    {
        $this->gamintojas = $gamintojas;
        $this->modelis = $modelis;
    }
    public function getName(){
        return $this->gamintojas . ' ' . $this->modelis;
    }
}

$fiat = new Car('Fiat', '500');

$lancia = new Car('lancia', 'Integrale');

//pakeiciam gamintoja fiato
//$fiat->gamintojas = 'Audi';

print $fiat->getName();