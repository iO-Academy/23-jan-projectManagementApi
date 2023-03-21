<?php

namespace ProjMange\Services;

abstract class CalculateOverdueService
{
    /**
     * Calculates whether the project is overdue
     * @return bool
     */
    public static function calculateOverdue($deadline): bool
    {
        return date($deadline) < date('Y-m-d')
            && date($deadline) !== null;
    }
}

