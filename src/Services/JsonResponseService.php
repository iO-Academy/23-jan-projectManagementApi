<?php

namespace ProjMange\Services;

abstract class JsonResponseService
{
    /**
     * Returns the inputted message and data as an array
     *
     * @param string $message
     * @param array $data
     * @return array with the message input and the data input
     */
    public static function jsonResponseAllProjects(string $message, array $data = []): array
    {
        return ['message' => $message, 'data' => $data];
    }

    public static function jsonResponseProject(string $message, object $data): array
    {
        return ['message' => $message, 'data' => $data];
    }
}
