<?php

require_once 'vendor/autoload.php';

header('Content-Type: application/json; charset=utf-8');

use ProjMange\Services\RequestValidatorService;

try {
    $inputId = $_GET['id'];
    RequestValidatorService::validateId($inputId);
    $dbConn = new \ProjMange\Services\DbConnService();
    $db = $dbConn->getConn();
    $projects = ProjectHydrator::getAllProjects($db);
    $users = UserHydrator::getUserById($db);
    setUsers($users);
}