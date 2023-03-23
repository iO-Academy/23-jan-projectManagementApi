<?php

namespace ProjMange\Services;

use ProjMange\CustomExceptions\InvalidIdException;

abstract class RequestValidatorService
{
    /**
     * Validates the input id to make sure it exists, is a number and is not too big
     * @param int $inputId
     * @return void
     * @throws InvalidIdException
     */
    public static function validateId(int $inputId): void
    {
        $validatedId = filter_var($inputId, FILTER_VALIDATE_INT);
        if (!$validatedId || $validatedId > 1000000) {
            throw new InvalidIdException('Invalid project ID');
        }
    }
}