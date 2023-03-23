<?php

require_once 'vendor/autoload.php';

header("Access-Control-Allow-Origin: *");
header('Content-Type: application/json; charset=utf-8');

use ProjMange\CustomExceptions\InvalidIdException;
use ProjMange\Services\RequestValidatorService;
use ProjMange\Hydrators\ProjectHydrator;
use ProjMange\Hydrators\UserHydrator;

$inputId = intval($_GET['id']);

//if (!RequestValidatorService::validateId($inputId)) {
//    http_response_code(400);
//    $message = 'Invalid project ID';
//    echo $message;
//}

//try {
//    !RequestValidatorService::validateId($inputId);
//} catch (\Exception $exception) {
//    http_response_code(400);
//    $message = 'Invalid project ID';
//    echo $message;
//}

try {
    RequestValidatorService::validateId($inputId);
    $dbConn = new \ProjMange\Services\DbConnService();
    $db = $dbConn->getConn();
    $project = ProjectHydrator::getProjectById($db, $inputId);
    $users = UserHydrator::getUserById($db, $inputId);
    $project->setUsers($users);
    $message = 'Successfully retrieved project';
    $project = [$project];
} catch (InvalidIdException $exception) {
    http_response_code(400);
    $message = $exception->getMessage();
    $project = [];
} catch (\Exception $exception) {
    http_response_code(500);
    $message = 'Unexpected error';
    $project = [];
}

echo json_encode(\ProjMange\Services\JsonResponseService::formatJsonResponse($message, $project));