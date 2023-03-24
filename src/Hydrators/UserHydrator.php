<?php

namespace ProjMange\Hydrators;

use ProjMange\Entities\UserEntity;

class UserHydrator
{
    /**
     * retrieves user data from db
     * @param PDO $db
     * @param int $id
     * @return mixed
     */
    public static function getUserById(\PDO $db, int $id)
    {
        $stmnt = $db->prepare("SELECT `users`.`id`, `users`.`name`, `users`.`avatar`, `users`.`role` FROM  `project_users` LEFT JOIN `users` ON `project_users`.`user_id` = `users`.`id` WHERE `project_users`.`project_id` = :id;");
        $stmnt->setFetchMode(\PDO::FETCH_CLASS, UserEntity::class);
        $stmnt->bindParam(':id', $id);
        $stmnt->execute();
        return $stmnt->fetchAll();
    }
}
