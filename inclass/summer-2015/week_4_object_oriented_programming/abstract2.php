<?php


abstract class AbsTest
{
    abstract public function doWork();

}

class AbsConcrete extends AbsTest
{
    public function doWork()
    {
        echo "I am doing some work";
    }
}


$test = new AbsConcrete();
$test->doWork();


// This order class will contain common functionality for both kinds of orders
abstract class OrderAbstract
{
    public function getOrderItems()
    {
    }
}

// An order that has not been completed yet
class Order extends OrderAbstract
{
    public function getOrderTotal()
    {
    }
}

// This one is an order that has been paid for
class OrderComplete extends OrderAbstract
{
    // May consider discounts
    public function getOrderTotal()
    {
    }
}

$shoppingCart = new Order();
$completedOrder = new OrderComplete();