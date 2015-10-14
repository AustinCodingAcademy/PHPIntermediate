<?php

class Database
{
    /**
     * Instance of itself
     * @var Database
     */
    private static $instance;

    private function __construct($host, $username, $password)
    {
        // Connect to mysql
        echo 'Connecting to mysql...<br/>';
        echo 'Host: ' . $host . ' User:' . $username . ' Pass:' . $password;
        echo '<hr/>';
    }

    public static function getInstance($host, $username, $password)
    {
        if (!isset(self::$instance)) {
            self::$instance = new self($host, $username, $password);
        }

        return self::$instance;
    }
}

$db = Database::getInstance('localhost', 'root', 'root');
$db = Database::getInstance('localhost', 'root', 'root');
$db = Database::getInstance('localhost', 'root', 'root');
$db = Database::getInstance('localhost', 'root', 'root');
$db = Database::getInstance('localhost', 'root', 'root');
$db = Database::getInstance('localhost', 'root', 'root');
$db = Database::getInstance('localhost', 'root', 'root');
$db = Database::getInstance('localhost', 'root', 'root');
$db = Database::getInstance('localhost', 'root', 'root');
