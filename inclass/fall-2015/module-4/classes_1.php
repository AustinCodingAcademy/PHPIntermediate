<?php

// This is called defining the class
class Person
{
    public $name;

    public $age;

    public $location;

    protected $socialSecurityNumber;

    private $bankAccountNumber;

    // This is a method, because its in a class
    public function isThisPersonCool()
    {
        if ($this->location == 'Austin') {
            return $this->name . ' Yeah you are cool';
        } else {
            return 'No your not, but please don\'t move here';
        }
    }
}

// This is when you use the class
// i.e. instantiate the class into an object
$chelsea = new Person();
$chelsea->name = 'Chelsea';
$chelsea->age = 24;
$chelsea->location = 'New York';

echo $chelsea->isThisPersonCool();
echo '<hr/>';

$samir = new Person();
$samir->location = 'Austin';
$samir->age = 31;
$samir->name = 'Samir';
echo $samir->isThisPersonCool();
die();

echo '<pre>';
print_r($chelsea);

echo '<pre>';
print_r($samir);