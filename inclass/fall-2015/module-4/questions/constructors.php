<?php

class Animal
{
    protected $name;

    public function __construct($name)
    {
        $this->name = $name;

        $this->superComplicatingWork();
    }

    private function superComplicatingWork()
    {
        // Do work!
    }
}

class Person extends Animal
{
    protected $address;

    public function __construct($name, $address)
    {
        parent::__construct($name);

        $this->address = $address;
    }
}

