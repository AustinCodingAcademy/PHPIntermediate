<?php

// Factory design pattern!
// Car factory, Toyota Corolla example
class CarFactory
{
    #_____________
    #    .___. <-- This is a whale

    # Remember the trick is to instantiate the correct child object
    # Also make sure that the child has the correct parent

    public static function getCar($make, $model)
    {
        // Remember how to make the first character uppercase
        $className = ucfirst(strtolower($model));
        //echo '$className=' . $className;

        // How do you make sure a class exists?
        if (!class_exists($className)) {
            // How do you throw exceptions?
            throw new Exception($className . ' does not exist!');
        }

        // Remember how to dynamically instantiate objects
        $obj = new $className();

        $make = ucfirst($make);

        // How do you make sure the parent class is valid?
        if (!is_subclass_of($obj, $make)) {
            throw new Exception($className . ' is not a subclass of ' . $make);
        }

        return $obj;
    }
}

class Toyota
{
}

class Corolla extends Toyota
{
}

class Prius extends Toyota
{
}


$car = CarFactory::getCar('toyota', 'corolla');
print_r($car);