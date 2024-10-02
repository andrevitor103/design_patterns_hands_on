<?php

declare(strict_types=1);

namespace src\state\jira\state;

use src\state\jira\Card;

final class CreatedState implements State
{
    public const VALUE = 'created';
    public function __construct(private readonly Card $card)
    {
    }

    public function inProgress(): void
    {
        $this->card->state = new ProgressState($this->card);
    }

    /**
     * @throws InvalidChangeState
     */
    public function done(): void
    {
        $this->throwInvalidChangeState(DoneState::class);
    }

    public function cancel(): void
    {
        $this->throwInvalidChangeState(CancelState::class);
    }

    public function awaitCustomer(): void
    {
        $this->throwInvalidChangeState(WaitCustomerState::class);
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
