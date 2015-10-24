<?php

class CarFactory
{
    /**
     * Make a car!
     * @param string $make Make of the car i.e. toyota, honda etc...
     * @param string $model The type of car i.e. corolla, prius etc...
     * @throws Exception
     * @return mixed
     */
    public static function getCar($make, $model)
    {
        // Makes the first character uppercase
        $className = ucfirst($model);

        if (!class_exists($className)) {
            throw new Exception($className . ' has not been created!');
        }

        // Instantiate the class dynamically
        $carObject = new $className();

        $parentClass = get_parent_class($carObject);
        if (ucfirst($make) != $parentClass) {
            throw new Exception($make . ' is not valid for ' . $model);
        }

        return $carObject;
    }
}

abstract class Toyota
{
}

class Corolla extends Toyota
{
}

class Camry extends Toyota
{
}

class Prius extends Toyota
{
}

try {
    $car = CarFactory::getCar('toyota', 'civic');
    echo '<pre>';
    print_r($car);
} catch (Exception $whatevs) {
    echo '<font color="red">'.$whatevs->getMessage().'</font>';
}
