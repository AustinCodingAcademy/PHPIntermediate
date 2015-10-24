<?php

class User
{
    /**
     * Database connector
     * @var Database
     */
    protected $db;

    public function __construct(Database $db)
    {
        $this->db = $db;
    }

    /**
     * Get one user row from MySQL
     * @param int $userId PK for this user
     * @return array
     */
    public function getOneUserRow($userId)
    {
        $query = 'select * from user where id = "' . $userId . '"';
        return $this->db->fetchRow($query);
    }
}