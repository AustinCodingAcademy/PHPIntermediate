<?php

// declaring

class Person
{
    public $name = 'Callie';

    protected $age = 20;

    private $social = 123;

    // Going to run when you instantiate the object
    public function __construct($name, $age, $social)
    {
        $this->name = $name;
        $this->age = $age;
        $this->social = $social;
    }

    public function isCool()
    {
        if($this->age < 40){
            return $this->name.' is cool';
        }else{
            return $this->name.' is not cool';
        }
    }
}

// usage
$myPerson = new Person('samir', 31, 466); // $myFather is an object of type "Father"

echo $myPerson->isCool();

