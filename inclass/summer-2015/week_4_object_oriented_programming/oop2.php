<?php

class Product
{
    public $name;

    public $price;

    public $inStock;

    public function __construct($foo, $price, $stock)
    {
        $this->name = $foo;
        $this->price = $price;
        $this->inStock = $stock;
    }
}

$shoe = new Product('Nike shox', 120.33, true);
echo '<pre>';
var_dump($shoe);

$shoe2 = new Product('Nike shox2', 120.33, true);
echo '<pre>';
var_dump($shoe2);