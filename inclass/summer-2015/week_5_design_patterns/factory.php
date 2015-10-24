<?php

abstract class Car
{
    protected $model;

    public function __construct($model)
    {
        $this->model = $model;
    }

    public function getTorque()
    {
        return 1500;
    }
}

class Corolla extends Car
{
    public function getTorque()
    {
        return $this->model . ' - ' . 1000;
    }
}

class Camry extends Car
{
    public function getTorque()
    {
        return $this->model . ' - ' . parent::getTorque();
    }
}

class CarFactory
{
    public static function getCar($make, $model)
    {
        if ($make == 'corolla') {

            return new Corolla($model);
        } elseif ($make == 'camry') {

            return new Camry($model);
        } else {
            throw new NotImplementedException($make . ' is not defined!');
        }
    }
}

try {

    $corolla = CarFactory::getCar('corolla', 'DX');
    $camry = CarFactory::getCar('camry', 'LX');


    echo 'Corollas Torque: ' . $corolla->getTorque() . '<br/>';
    echo 'Camrys Torque: ' . $camry->getTorque() . '<br/>';


} catch (NotImplementedException $exceptionObject) {

    echo '<p style="color:red;">' . $exceptionObject->getMessage() . '</p>';

} catch (DeveloperException $devException) {

    // Something caught on fire

} catch (GooglePaymentFailedException $googleException) {

    // Send out SMS alerts, ring the phones, dim the lights
}


class UserException extends Exception
{
}

class DeveloperException extends Exception
{
}

class NotImplementedException extends Exception
{
}

class GooglePaymentFailedException extends Exception
{
}
