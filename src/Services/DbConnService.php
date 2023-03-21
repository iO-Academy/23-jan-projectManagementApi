<?php

namespace ProjMange\Services;

class DbConnService
{
    private $db;


    /**
     * Constructor method to create db connection when DbConnService object instansiated
     *
     */
    public function __construct()
    {
        $this->db = new \PDO('mysql:host=db; dbname=project_manager', 'root', 'password');
    }


    /**
     * Retrieves the PDO connection for the DbConnService object
     *
     * @return $db object with PDO connection
     */
    public function getConn(): \PDO
    {
        return $this->db;
    }
}