<?php

// This is a contract
interface ProductPriceInterface
{
    /**
     * This is a price depending on where on the site you are
     * @return float
     */
    public function getPrice();

    public function setPrice($price);
}

interface ProductDetailInterface
{

    public function getProductDescription();
}

// Do not instantiate!
class Product implements ProductPriceInterface, ProductDetailInterface
{
    protected $name;

    protected $price;

    public function __construct($name, $price)
    {
        $this->name = $name;
        $this->price = $price;
    }

    public function getProductDescription()
    {

    }

    public function setPrice($price)
    {
        $this->price = $price;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getPrice()
    {
        return $this->price;
    }


}


class CheckoutPageProduct extends Product
{

}