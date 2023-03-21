<?php

namespace ProjMange\Entities;

class UserEntity
{
    private int $id;
    private string $name;
    private string $avatar;
    private string $role;


    /**
     * instruct object on how to appear when turned into json
     * @return array
     */
    public function jsonSerialize(): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'avatar' => $this->avatar,
            'role' => $this->role
        ];
    }
}