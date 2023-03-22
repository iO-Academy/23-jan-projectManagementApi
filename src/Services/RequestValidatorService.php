<?php

namespace ProjMange\Services;

abstract class RequestValidatorService
{
    public static function validateId(int $inputId, array $projects): bool
    {
        $validatedId = filter_var($inputId, FILTER_VALIDATE_INT);
        if ($validatedId !== false && $validatedId < 1000000 && array_key_exists($inputId, $projects)) {
            return true;
        } else {
            return false;
        }
    }
}




//If the id exists in th db return project, else catch error Code: 400 BAD REQUEST
//Content: {"message": "Invalid project ID", "data": []}
