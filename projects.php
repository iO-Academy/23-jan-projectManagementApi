<?php

use ProjMange\Hydrators\ProjectHydrator;

header('Content-Type: application/json; charset=utf-8');


$dbConn = new DbConn();
$db = $dbConn->getConn();
$projects = ProjectHydrator::getAllProjects($db);

echo '<pre>';
var_dump($projects);
echo '</pre>';