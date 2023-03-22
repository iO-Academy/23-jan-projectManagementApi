<?php

require_once 'vendor/autoload.php';

header('Content-Type: application/json; charset=utf-8');

use ProjMange\Services\RequestValidatorService;
use ProjMange\Hydrators\ProjectHydrator;
use ProjMange\Hydrators\UserHydrator;

$inputId = $_GET['id'];
if (!RequestValidatorService::validateId($inputId)) {
    http_response_code(400);
    $message = 'Invalid project ID';
}
try {
    $dbConn = new \ProjMange\Services\DbConnService();
    $db = $dbConn->getConn();
    $project = ProjectHydrator::getProjectById($db, $inputId);
    $users = UserHydrator::getUserById($db, $inputId);
    $message = 'Successfully retrieved project';
} catch (\Exception $exception) {
    http_response_code(500);
    $message = 'Unexpected error';
    $project = [];
}

$project->setUsers($users);

//echo '<pre>';
//var_dump($project);
//echo '</pre>';

echo json_encode(\ProjMange\Services\JsonResponseService::jsonResponseProject($message, $project));