<?php

// This class cannot be instantiated because its abstract
abstract class Product
{
    protected $name;

    protected $price;

    public function __construct($price, $name)
    {
        $this->price = $price;
        $this->name = $name;
    }

    // This method must be implemented by children
    abstract function getPrice();

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }
}

class HomePageProduct extends Product
{
    public function getPrice()
    {
        return $this->price;
    }
}

class ShoppingCartProduct extends Product
{
    public function getPrice()
    {
        $qty = 10;

        return $this->price * $qty;
    }
}

// $product = new Product();
