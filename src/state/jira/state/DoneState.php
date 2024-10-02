<?php

declare(strict_types=1);

namespace src\state\jira\state;

use src\state\jira\Card;

final class DoneState implements State
{
    public const VALUE = 'done';
    public function __construct(private readonly Card $card)
    {
    }

    public function inProgress(): void
    {
        $this->throwInvalidChangeState(ProgressState::getValue());
    }

    public function done(): void
    {
        return;
    }

    public function cancel(): void
    {
        $this->throwInvalidChangeState(CancelState::getValue());
    }

    public function awaitCustomer(): void
    {
        $this->throwInvalidChangeState(WaitCustomerState::getValue());
    }

    public static function getValue(): string
    {
        return self::VALUE;
    }

    public function throwInvalidChangeState(string $invalidState): void
    {
        throw new InvalidChangeState(self::getValue(), $invalidState);
    }
}
