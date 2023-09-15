<?php

namespace src\state\status;

use src\state\Order;

abstract class OrderStatus
{
    public string $value;

    public function __construct(public readonly Order $order)
    {
    }
    abstract public function request(): void;
    abstract public function approve(): void;
    abstract public function deny(): void;
}