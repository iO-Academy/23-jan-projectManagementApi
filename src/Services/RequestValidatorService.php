<?php

namespace ProjMange\Services;

class RequestValidatorService
{
    public function validateId(int $id): bool
    {
        $validatedId = filter_var($id, FILTER_VALIDATE_INT);
        if ($validatedId !== false && $validatedId < 1000000 && array_key_exists($id, $projects)) {
            return true;
        } else {
            return false;
        }
    }
}




//If the id exists in th db return project, else catch error Code: 400 BAD REQUEST
//Content: {"message": "Invalid project ID", "data": []}
