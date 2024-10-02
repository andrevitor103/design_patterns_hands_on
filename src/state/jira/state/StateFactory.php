<?php

namespace src\state\jira\state;

use RuntimeException;

final class StateFactory
{
    public static function create(string $value): State
    {
        return match ($value) {
            'create' => new CreatedState(),
            'in_progress' => new ProgressState(),
            'await_customer' => new WaitCustomerState(),
            'done' => new DoneState(),
            'cancel' => new CancelState(),
            default => throw new RuntimeException('State not allowed: ' . $value)
        };
    }
}
