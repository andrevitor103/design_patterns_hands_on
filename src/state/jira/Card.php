<?php

declare(strict_types=1);

namespace src\state\jira;

use src\state\jira\state\State;
use src\state\jira\state\StateFactory;

final class Card
{
    private function __construct(private readonly string $title, public State $state)
    {
    }


    public static function create(string $title): self
    {
        return new Card(
            title: $title,
            state: StateFactory::create('create')
        );
    }

    public function moveToProgress(): void
    {
        $this->state->inProgress();
    }

    public function moveToAwaitCustomer(): void
    {
        $this->state->awaitCustomer();
    }

    public function moveToDone(): void
    {
        $this->state->done();
    }

    public function moveToCancel(): void
    {
        $this->state->cancel();
    }
}


$card = Card::create('teste');

$card->moveToProgress();

$card->moveToAwaitCustomer();

$card->moveToDone();

$card->moveToCancel();
