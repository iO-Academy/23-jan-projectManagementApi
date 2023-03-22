<?php

namespace ProjMange\Entities;

use ProjMange\Services\CalculateOverdueService;

class ProjectEntity implements \JsonSerializable
{
    private int $id;
    private string $name;
    private int $client_id;
    private $deadline;
    
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
            'deadline' => $this->deadline,
            'overdue' => CalculateOverdueService::calculateOverdue($this->deadline)
        ];
    }
}