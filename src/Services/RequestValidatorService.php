<?php

namespace ProjMange\Services;

abstract class RequestValidatorService
{
    public static function validateId(int $inputId, array $projects): bool
    {
        $validatedId = filter_var($inputId, FILTER_VALIDATE_INT);
        if ($validatedId !== false && $validatedId < 1000000) {
            return true;
        } else {
            return false;
        }
    }
}