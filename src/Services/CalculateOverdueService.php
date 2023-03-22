<?php

namespace ProjMange\Services;

abstract class CalculateOverdueService
{
    /**
     * Calculates whether a date is overdue
     * @param mixed - the deadline property from the db
     * @return bool
     */
    public static function calculateOverdue($deadline): bool
    {
        if(!is_string($deadline) && $deadline !== null) {
            throw new \TypeError('wrong data type');
        }
        if(!strtotime($deadline)) {
            return false;
        }
        return date($deadline) < date('Y-m-d')
            && date($deadline) !== '';
    }
}

