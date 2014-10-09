<?php

/**
 * Class DBCommon without a singleton pattern applied
 */
class DBCommon
{
    /**
     * Database connection
     *
     * @var resource
     */
    protected $db;

    public function __construct()
    {
        $this->db = new mysqli(
            $host = 'localhost', $username = 'user', $password = 'pass123',
            $databaseName = 'acadb', $port = 3306
        );
    }

    public function query($sql)
    {
        // Run the actual query and return results...
    }
}