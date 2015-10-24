<?php

class Army
{
    public static $strength = 20;

    public static function getStrength()
    {
        return static::$strength; // late static binding
    }
}

class Batallion extends Army
{
    public static $strength = 10;
}

class Unit extends Batallion
{
    public static $strength = 5;
}

echo 'Army strength:' . Army::getStrength() . '<br/>';
echo 'Batallion strength:' . Batallion::getStrength() . '<br/>';
echo 'Unit strength:' . Unit::getStrength() . '<br/>';

