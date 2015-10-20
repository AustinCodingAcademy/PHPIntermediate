<?php

class Door
{
    /**
     * small|big|gigantic
     * @var string
     */
    protected $size;

    public function __construct($size)
    {
        $this->size = $size;
    }
}

class Window
{
    /**
     * sliding|opening
     * @var string
     */
    protected $type;

    public function __construct($type)
    {
        $this->type = $type;
    }
}

class Floor
{
    /**
     * tile|carpet|linoleum
     * @var string
     */
    protected $material;

    public function __construct($material)
    {
        $this->material = $material;
    }
}

###############################################
###############################################
############MAKE A HOUSE#######################
###############################################
###############################################

class House
{
    protected $door;

    protected $window;

    protected $floor;

    // This is constructor DI. Use this when dependencies are mandatory
    public function __construct(Door $door, Window $window, Floor $floor)
    {
        $this->door = $door;
        $this->window = $window;
        $this->floor = $floor;
    }

    /**
     * This is setter DI. This is used when the dependency is optional
     * @param Window $window
     */
    public function setWindow($window)
    {
        $this->window = $window;
    }
}

// The mighty Service Container!!!
// The SC is a location for you to instantiate all your objects, and manage dependencies

echo '<pre>';
$mainDoor = new Door('gigantic');
//print_r($mainDoor);

$kitchenWindow = new Window('sliding');
//print_r($kitchenWindow);

$bedroomFloor = new Floor('carpet');
//print_r($bedroomFloor);

$house = new House($mainDoor, $kitchenWindow, $bedroomFloor);
print_r($house);