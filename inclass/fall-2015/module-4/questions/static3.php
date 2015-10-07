<?php

class DatabaseAccess
{
    public static $shouldCache = false;


    public function getData()
    {
        if (self::$shouldCache == true) {
            return 'data from cache';
        } else {
            return 'data from database';
        }
    }
}

// getting user data!
$db = new DatabaseAccess();
$data = $db->getData();
echo $data;
echo '<br/>';

// Getting a blog post
DatabaseAccess::$shouldCache = true;

$db1 = new DatabaseAccess();
$data = $db1->getData();
echo 'DB1 data: '.$data;
echo '<br/>';

DatabaseAccess::$shouldCache = false;

$db2 = new DatabaseAccess();
$data = $db2->getData();
echo 'DB2 data: '.$data;
echo '<br/>';


