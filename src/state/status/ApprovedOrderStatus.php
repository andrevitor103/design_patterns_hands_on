<?php
namespace src\state\status;

use src\state\Order;

class ApprovedOrderStatus extends OrderStatus
{
    public function __construct(Order $order)
    {
        parent::__construct($order);
        $this->value = 'approved';
    }

    public function request(): void
    {
        throw new InvalidStatusTransition('approved', 'requested');
    }

    public function approve(): void
    {
        return;
    }

    public function deny(): void
    {
        throw new InvalidStatusTransition('approved', 'denied');
    }
}