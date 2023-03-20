<?php

namespace ProjMange\Entities;

use phpDocumentor\Reflection\Types\Boolean;

class ProjectEntity
{
    private int $id;
    private string $name;
    private int $client_id;
    private string $deadline;

    private function calculateOverdue(): bool
    {
        return date($this->deadline) <= date('Y-m-d');
    }

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

$test = new ProjectEntity();

echo json_encode($test);