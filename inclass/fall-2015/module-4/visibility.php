<?php

// @todo: show constructor overriding aka. parent::__construct()

class Animal
{
    public $name;

    public $hasHair;

    protected $isWealthy;

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
    public function getHasHair()
    {
        return $this->hasHair;
    }

    /**
     * @param mixed $hasHair
     */
    public function setHasHair($hasHair)
    {
        $this->hasHair = $hasHair;
    }

    /**
     * @return mixed
     */
    public function getIsWealthy()
    {
        return $this->isWealthy;
    }

    /**
     * @param mixed $isWealthy
     */
    public function setIsWealthy($isWealthy)
    {
        $this->isWealthy = $isWealthy;
    }


}

class Human extends Animal
{
    public function __construct($isWealthy)
    {
        $this->isWealthy = $isWealthy;
    }

    /**
     * If the person is wealthy, say they are, otherwise, say they are not
     * @return string
     */
    public function checkWealth()
    {
        if ($this->isWealthy) {
            return 'Yeah your\'e doing good';
        } else {
            return 'Do more work!';
        }
    }
}


$dog = new Animal();
$dog->name = 'Maximus';
$dog->hasHair = true;
$dog->setIsWealthy(false);

$brian = new Human($isWealthy = true);
echo '<pre>';
var_dump($brian);