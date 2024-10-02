<?php

declare(strict_types=1);

namespace src\state\jira\state;

use src\state\jira\Card;

final class ProgressState implements State
{
    public const VALUE = 'progress';
    public function __construct(private readonly Card $card)
    {
    }

    public function inProgress(): void
    {
        return;
    }

    public function done(): void
    {
        $this->card->state = new DoneState($this->card);
    }

    public function cancel(): void
    {
        $this->card->state = new CancelState($this->card);
    }

    public function awaitCustomer(): void
    {
        $this->card->state = new WaitCustomerState($this->card);
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
