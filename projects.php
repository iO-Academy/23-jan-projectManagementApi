<?php

require_once 'vendor/autoload.php';

use ProjMange\Hydrators\ProjectHydrator;

header('Content-Type: application/json; charset=utf-8');

try {
    $dbConn = new ProjMange\Services\DbConnService();
    $db = $dbConn->getConn();
    $projects = ProjectHydrator::getAllProjects($db);
    $successMessage = 'Successfully retrieved projects';
    echo json_encode(\ProjMange\Services\JsonResponseService::jsonResponse($successMessage, $projects));
} catch ()