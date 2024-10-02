<?php

namespace src\state\jira\state;

interface State
{
    public function inProgress(): void;

    public function done(): void;

    public function cancel(): void;

    public function awaitCustomer(): void;

    public static function getValue(): string;

    public function throwInvalidChangeState(string $invalidState): void;
}
