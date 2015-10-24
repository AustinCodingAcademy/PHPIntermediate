<?php

// Our class definition
class Person
{
    // public properties can be accessed from the outside
    public $name;

    public $age;

    public $canDrink;

    public $ccBalance;

    public $canShop;

    public function __construct($name, $age, $ccBalance)
    {
        $this->name = $name;
        $this->age = $age;
        $this->ccBalance = $ccBalance;

        $this->isAllowedToDrink();
        $this->isAllowedToShop();
    }

    /**
     * Is this person allowed to drink?
     * This is a `method` because it is a function in a class
     * @return void
     */
    public function isAllowedToDrink()
    {
        if ($this->age > 21) {
            $this->canDrink = 'Yes';
        } else {
            $this->canDrink = 'No';
        }
    }

    public function isAllowedToShop()
    {
        if ($this->ccBalance > 5000) {
            $this->canShop = 'Yes';
        } else {
            $this->canShop = 'No';
        }
    }


    /**
     * Get this person's name
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }
}


//$studentObjects = [];
//
$students = array('Bob' => 21, 'Jack' => 54, 'Jill' => 32);
//
//foreach ($students as $studentName => $studentAge) {
//
//    $studentObjects[] = new Person($studentName, $studentAge);
//}
//
//
//echo '<pre>';
//print_r($studentObjects);




// Where we instantiate the class into an object
// This is where we create an `instance` from the blueprint
$student = new Person('Sue', 18, 6500);
echo '<pre>';
print_r($students);
echo '<br/>';
print_r($student);