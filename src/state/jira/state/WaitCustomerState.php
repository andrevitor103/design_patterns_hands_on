<?php

declare(strict_types=1);

namespace src\state\jira\state;

use src\state\jira\Card;

final class WaitCustomerState implements State
{
    public const VALUE = 'wait_customer';
    public function __construct(private readonly Card $card)
    {
    }

    public function inProgress(): void
    {
        $this->card->state = new ProgressState($this->card);
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
        return;
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
