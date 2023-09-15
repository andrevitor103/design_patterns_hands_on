<?php

namespace src\state\status;

use RuntimeException;

final class InvalidStatusTransition extends RuntimeException
{
    public function __construct(string $currentState, string $newState)
    {
        parent::__construct();
        $this->message = sprintf("Invalid status transition: '%s' to '%s'", $currentState, $newState);
    }
}