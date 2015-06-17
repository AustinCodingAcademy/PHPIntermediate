<?php


class Database
{
    public static $shouldCache = true;

    public function getData()
    {
        return self::$shouldCache == true ? 'From cache' : 'From DB';
    }
}


$mysql = new Database();
echo 'Mysql Data: ' . $mysql->getData();
echo "\n\n\n";

Database::$shouldCache = false;

$oracle = new Database();
echo 'oracle data:' . $oracle->getData();
echo "\n\n\n";

$postgres = new Database();
echo 'postgres data:' . $postgres->getData();
echo "\n\n\n";
