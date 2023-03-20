<?php

namespace ProjMange\Services;

class DbConnService
{
    private $db;

    public function __construct()
    {
        $this->db = new PDO('mysql:host=db; dbname=project_manager', 'root', 'password');
    }

    public function getConn(): PDO
    {
        return $this->db;
    }
}