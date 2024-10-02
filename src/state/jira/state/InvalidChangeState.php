<?php

declare(strict_types=1);

namespace src\state\jira\state;

use Exception;

final class InvalidChangeState extends Exception
{
    public function __construct(string $currentState, string $newState)
    {
        parent::__construct("Invalid state transition. ($currentState => $newState) ");
    }
}
