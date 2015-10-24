<?php

class StaticExample
{
    public static $shouldCache;

    public static function doSomeWork()
    {
        echo 'I am doing some work...';

        // This is how to reference a static property from inside the class itself
        self::$shouldCache = true;
    }
}

$obj = new StaticExample();
//$obj->doSomeWork(); // not proper

StaticExample::doSomeWork(); // this is proper

// How to set the property from the outside
StaticExample::$shouldCache = true;
StaticExample::$shouldCache = false;
