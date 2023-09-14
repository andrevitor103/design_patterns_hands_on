<?php

namespace src\state;

final class StatusFactory
{
    public static function create(string $value): Status
    {
        if ($value == 'in_progress') {
            return new InProgressStatus();
        }

        if ($value == 'approved') {
            return new ApprovedStatus();
        }

        if ($value == 'denied') {
            return new DeniedStatus();
        }
        throw new \RuntimeException('Unknown status');
    }
}