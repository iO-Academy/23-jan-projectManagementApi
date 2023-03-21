<?php

namespace ProjMange\Hydrators;

use ProjMange\Entities\ProjectEntity;

class ProjectHydrator
{

    /**
     * Retrieves projects data from DB
     * @param \PDO $db
     * @return mixed
     */
    public static function getAllProjects(\PDO $db)
    {
        $stmt = $db->prepare("SELECT `id`, `name`, `client_id`, `deadline` FROM `projects`;");
        $stmt->setFetchMode(\PDO::FETCH_CLASS, ProjectEntity::class);
        $stmt->execute();
        return $stmt->fetchAll();
    }
}