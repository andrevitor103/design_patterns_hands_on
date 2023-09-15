<?php

namespace src\state;

use src\state\status\OrderStatus;
use src\state\status\StatusFactory;

class Order
{
    public OrderStatus $status;

    public function __construct(string $status)
    {
        $this->status = StatusFactory::create($this, $status);
    }

    public static function create(): Order
    {
        return new Order('in_progress');
    }

    public function request(): void {
        $this->status->request();
    }

    public function approve(): void {
        $this->status->approve();
    }

    public function deny(): void {
        $this->status->deny();
    }
}
