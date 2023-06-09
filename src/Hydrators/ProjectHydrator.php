<?php

namespace ProjMange\Hydrators;

use ProjMange\Entities\ProjectEntity;
use ProjMange\Entities\ProjectWithUsersEntity;

abstract class ProjectHydrator
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

    /**
     * @retrieves project data from the db with additional client data
     * @param PDO $db
     * @param int $id
     * @return mixed
     */
    public static function getProjectById(\PDO $db, int $id)
    {
        $stmnt = $db->prepare("SELECT `projects`.`id`, `projects`.`name`, `projects`.`client_id`, `projects`.`deadline`,
`clients`.`name` AS 'client_name', `clients`.`logo` AS 'client_logo' FROM `projects`
LEFT JOIN `project_users` ON `projects`.`id` = `project_users`.`project_id`
LEFT JOIN `clients` ON `projects`.`client_id` = `clients`.`id`
WHERE `project_users`.`project_id` = :id;");
        $stmnt->setFetchMode(\PDO::FETCH_CLASS, ProjectWithUsersEntity::class);
        $stmnt->bindParam(':id', $id);
        $stmnt->execute();
        return $stmnt->fetch();
    }
}
