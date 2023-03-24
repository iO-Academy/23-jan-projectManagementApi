<?php

namespace ProjMange\Entities;

use ProjMange\Services\CalculateOverdueService;

class ProjectEntity implements \JsonSerializable
{
    protected int $id;
    protected string $name;
    protected int $client_id;
    protected $deadline;


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
     * Instructs object how to appear when turned into json
     * @return array
     */
    public function jsonSerialize(): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'client_id' => $this->client_id,
            'deadline' => $this->getDeadline(),
            'overdue' => CalculateOverdueService::calculateOverdue($this->deadline),
        ];
    }
}
