<?php

declare(strict_types=1);

namespace src\state\jira\state;

use src\state\jira\Card;

final class CancelState implements State
{
    public const VALUE = 'cancel';
    public function __construct(private readonly Card $card)
    {
    }

    public function inProgress(): void
    {
        $this->throwInvalidChangeState(ProgressState::getValue());
    }

    public function done(): void
    {
        $this->throwInvalidChangeState(DoneState::getValue());
    }

    public function cancel(): void
    {
        return;
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
