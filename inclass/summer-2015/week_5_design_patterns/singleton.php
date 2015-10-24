<?php

// Want to make this a singleton!! but how?
class MySqlDatabase
{
    public static $instance;

    private function __construct()
    {
        // Connect to mysql????
        // It is going to open a socket connection from the web server to the DB server
        echo 'I am making a socket connection...<br/>';
    }

    public static function getInstance()
    {
        if (!isset(self::$instance)) {
            self::$instance = new self();
        }

        return self::$instance;
    }

    public function runQuery($query)
    {
        echo 'I am running: ' . $query . '<br/>';
    }
}

// Make this one a singleton i.e. I only want one socket connection to be made, ever!
class RedisDatabase
{
    public static $instance;

    private function __construct()
    {
        echo 'I am making a socket connection to redis...';
    }

    public static function getInstance()
    {
        if (!isset(self::$instance)) {
            self::$instance = new RedisDatabase();
        }

        return self::$instance;
    }
}


##################################
##index.php###
##################################

$db = MySqlDatabase::getInstance();
$query = 'select * from foo';
$db->runQuery($query);

$db = MySqlDatabase::getInstance();
$query = 'select * from bar';
$db->runQuery($query);