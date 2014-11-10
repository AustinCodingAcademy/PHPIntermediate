<?php

class Father
{
    public $firstName = 'Samir';

    protected $favoriteColor = 'Orange';

    private $socialSecurityNumber = '325-34-8724';
}

class Child extends Father
{
    public function testAccess()
    {
        // public properties can be accessed from anywhere
        echo "Father's First Name: " . $this->firstName . PHP_EOL;

        // Protected properties can be accessed by a child class only!
        echo "Favorite Color: " . $this->favoriteColor . PHP_EOL;

        // Private properties cannot be accessed by children
        // Notice: Undefined property: Child::$socialSecurityNumber
        echo 'SS Number: ' . $this->socialSecurityNumber . PHP_EOL;
    }
}


$Child = new Child();
$Child->testAccess();