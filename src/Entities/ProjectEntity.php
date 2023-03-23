<?php

namespace ProjMange\Entities;

use ProjMange\Services\CalculateOverdueService;

class ProjectEntity implements \JsonSerializable
{
    private int $id;
    private string $name;
    private int $client_id;
    private $client_name;
    private $client_logo;
    private $deadline;
    private array $users = [];

    /**
     * a function that formats the deadline date to use '/'. It will return null if there's no deadline
     * @return string|null
     */
    public function getDeadline()
    {
        if($this->deadline === null) {
            return null;
        }
        $datetime = new \DateTime($this->deadline);
        return $datetime->format('d/m/Y');
    }

    /**
     * adds user entities to the user array
     *
     * @param array $users
     * @return void
     */
    public function setUsers(array $users): void
    {
        foreach ($users as $user) {
            if ($user instanceof UserEntity) {
                $this->users[] = $user;
            }
        }
    }

    /**
     * Instructs object how to appear when turned into json
     * @return array
     */
    public function jsonSerialize(): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'client_id' => $this->client_id,
            'client_name' => $this->client_name,
            'client_logo' => $this->client_logo,
            'deadline' => $this->getDeadline(),
            'overdue' => CalculateOverdueService::calculateOverdue($this->deadline),
            'users' => $this->users
        ];
    }
}
