<?php

####################################################################################
// Part: 1
// Create a class called Person
// Accept three properties in the constructor: name, age, location
// Ensure getters and setters exist

class Person
{
    protected $name;

    protected $age;

    protected $location;

    public function __construct($name, $age, $location)
    {
        $this->name = $name;
        $this->age = $age;
        $this->location = $location;


        // Other business logic
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
    public function getAge()
    {
        return $this->age;
    }

    /**
     * @param mixed $age
     */
    public function setAge($age)
    {
        $this->age = $age;
    }

    /**
     * @return mixed
     */
    public function getLocation()
    {
        return $this->location;
    }

    /**
     * @param mixed $location
     */
    public function setLocation($location)
    {
        $this->location = $location;
    }
}

####################################################################################
// Part: 2
// Create a child class called Texan that extends Person
// All Texan objects should have 'texas' as the default location

class Texan extends Person
{
    protected $location;

    // Overriding the constructor
    public function __construct($name, $age, $location = 'Texas')
    {
        parent::__construct($name, $age, $location);

//        $this->name = $name;
//        $this->age = $age;
//        $this->location = $location;
    }
}


$texanPerson = new Texan('Bob', 12);
echo '<pre>';
print_r($texanPerson);
