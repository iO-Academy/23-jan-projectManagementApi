<?php

namespace ProjMange\Entities;

class ProjectEntity implements \JsonSerializable
{
    private int $id;
    private string $name;
    private int $client_id;
    private string $deadline;

    /**
     * Calculates whether the project is overdue
     * @return bool
     */
    private function calculateOverdue(): bool
    {
        return date($this->deadline) < date('Y-m-d');
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
            'deadline' => $this->deadline,
            'overdue' => $this->calculateOverdue()
        ];
    }
}