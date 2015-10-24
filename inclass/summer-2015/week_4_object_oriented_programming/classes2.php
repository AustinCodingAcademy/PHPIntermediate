<?php


class Person
{
    public $name;

    public function __construct($firstName)
    {
        $this->name = $firstName;
    }
}


$callie = new Person('Callie');

$samir = new Person('Samir');