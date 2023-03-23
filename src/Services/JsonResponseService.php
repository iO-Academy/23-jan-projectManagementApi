<?php

namespace ProjMange\Services;

use ProjMange\Entities\ProjectEntity;

abstract class JsonResponseService
{
    /**
     * Returns the inputted message and data as an array
     *
     * @param string $message
     * @param array $data
     * @return array with the message input and the data input
     */
    public static function formatJsonResponse(string $message, array $data = []): array
    {
        return ['message' => $message, 'data' => $data];
    }

    /**
     * Returns the inputted message and data as an array
     *
     * @param string $message
     * @param ProjectEntity $project
     * @return array with the message input and the data input
     */
    public static function formatJsonResponseProject(string $message = '', ProjectEntity $project): array
    {
        return ['message' => $message, 'data' => $project];
    }
}
