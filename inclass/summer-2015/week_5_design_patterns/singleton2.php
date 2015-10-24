<?php

/**
 * Class SingletonTest
 */
class SingletonTest
{
    /**
     * A single instantiated SingletonTest product
     * @var SingletonTest
     */
    private static $instance;

    private function __construct()
    {
        echo 'I was instantiated' . "\n\n";
    }

    /**
     * @return SingletonTest
     */
    public static function getInstance()
    {
        // We need to check if the $instance is set???
        if (!isset(self::$instance)) {

            // If it isn't set, then we need to set it, to ???
            self::$instance = new self();
        }

        // return the instantiated, singleton, instance
        return self::$instance;
    }
}

$obj1 = SingletonTest::getInstance();
$obj2 = SingletonTest::getInstance();
$obj3 = SingletonTest::getInstance();