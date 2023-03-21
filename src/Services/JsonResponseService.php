<?php

namespace ProjMange\Services;
abstract class JsonResponseService
{
    public static function jsonResponse(string $message, array $data = []): array
    {
        return ['data' => $data, 'message' => $message];
    }
}
