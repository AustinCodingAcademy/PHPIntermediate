<?php

class Product
{
    const DISCOUNT = .20;

    protected $name;

    protected $price;

    public function __construct($name, $price)
    {
        $this->name = $name;
        $this->price = $price;
    }

    public function getPrice()
    {
        return $this->price * (1 - self::DISCOUNT);
    }

}




class Shoe extends Product{

    public function isShoeAvailable(){

        if($this->price){


        }
    }
}

$watch = new Product('Swatch', 35);
echo 'Price with discount: ' . $watch->price . "\n";