<?php

require_once 'vendor/autoload.php';

use ProjMange\Hydrators\ProjectHydrator;

header('Content-Type: application/json; charset=utf-8');

try {
    $dbConn = new ProjMange\Services\DbConnService();
    $db = $dbConn->getConn();
    $projects = ProjectHydrator::getAllProjects($db);
    $message = 'Successfully retrieved projects';
} catch (\Exception $exception) {
    http_response_code(500);
    $message = 'Unexpected error';
    $projects = [];
}
    echo json_encode(\ProjMange\Services\JsonResponseService::jsonResponse($message, $projects));
