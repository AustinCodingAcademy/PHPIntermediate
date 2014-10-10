<?php

class Foo
{
    const BAR = 'fubar';

    const NUM_COUNTRIES_ON_EARTH = 193;

    public function displayConstant()
    {
        echo self::BAR;
    }
}


$F = new Foo();

// How to access the constant internally
$F->displayConstant();

// How to access the constant from the outside the class
echo 'There are ' . Foo::NUM_COUNTRIES_ON_EARTH .' countries on earth';