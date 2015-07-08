<?php

// This is an example of Dependency Injection

class Window
{
    protected $slideType;

    public function __construct($slideType)
    {
        $this->slideType = $slideType;
    }

    public function render()
    {
        return $this->slideType;
    }
}

class Door
{
    protected $material;

    public function __construct($material)
    {
        $this->material = $material;
    }

    public function render()
    {
        return $this->material;
    }
}

class Floor
{
    protected $material;

    public function __construct($material)
    {
        $this->material = $material;
    }

    public function render()
    {
        return $this->material;
    }
}

class House
{
    /**
     * @var Window[]
     */
    protected $windows = [];

    protected $door;

    protected $floor;

    // Constructor Dependency Injection
    public function __construct($door = null, $floor = null)
    {
        $this->door = $door;
        $this->floor = $floor;
    }

    public function setWindow(Window $window)
    {
        $this->windows[] = $window;
    }

    public function buildHouse()
    {
        $return = 'The house has a ' . $this->door->render()
            . ' and a ' . $this->floor->render() . ' and it has....';

        foreach ($this->windows as $window) {
            $return .= ' a ' . $window->render() . ' and';
        }

        // This function will remove pieces from a string
        // The first argument is the string ($return)
        // The second is where you want to start, 0 is the end???
        //
        return substr($return, 0, -4);
    }
}

###########################################
$door = new Door('Main Door');
$floor = new Floor('Wooden Floor');

$house = new House($door, $floor);

$slidingWindow = new Window('Sliding Window');
$glassWindow = new Window('Glass Window');
$microsoftWindow = new Window('Microsoft Window');

$house->setWindow($slidingWindow);
$house->setWindow($glassWindow);
$house->setWindow($microsoftWindow);

echo $house->buildHouse();


$string = 'This is a super long string with nothing to do...';
$len = strlen($string);
//echo '$len='.$len;
echo substr($string, 0, $len - 3);

