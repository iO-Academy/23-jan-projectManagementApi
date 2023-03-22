<?php

namespace ProjMange\Entities;

use ProjMange\Services\CalculateOverdueService;

class ProjectEntity implements \JsonSerializable
{
    private int $id;
    private string $name;
    private int $client_id;
    private string $client_name;
    private string $client_logo;
    private $deadline;
    private array $users = [];

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
            'deadline' => $this->deadline,
            'overdue' => CalculateOverdueService::calculateOverdue($this->deadline),
            'users' => $this->users
        ];
    }
}
