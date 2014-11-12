<?php

class Door
{
    // Define properties and methods that define a door
}

class Window
{
    // Define properties and methods that define a window
}

class Flooring
{
    // Define properties and methods that define floor
}

/**
 * Class House that uses Setter Injection
 */
class House
{
    public function __construct()
    {
        // We are not injecting anything into the constructor
    }

    /**
     * @param Door $Door Main door
     */
    public function setDoor(Door $Door)
    {
        // Do something with the door
    }

    /**
     * @param Window $Window Living room window
     */
    public function setWindow(Window $Window)
    {
        // Do something with the window
    }

    /**
     * @param Floor $Floor Bathroom floor
     */
    public function setFloor(Floor $Floor)
    {
        // Do something with the floor
    }
}



