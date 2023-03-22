<?php

namespace ProjMange\Services;

abstract class RequestValidatorService
{
    /**
     * Validates the input id to make sure it exists, is a number and is not too big
     * @param int $inputId
     * @return bool
     */
    public static function validateId(int $inputId): bool
    {
        $validatedId = filter_var($inputId, FILTER_VALIDATE_INT);
        if ($validatedId !== false && $validatedId < 1000000) {
            return true;
        } else {
            return false;
        }
    }
}