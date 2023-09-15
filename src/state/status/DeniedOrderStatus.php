<?php
namespace src\state\status;

use src\state\Order;

class DeniedOrderStatus extends OrderStatus
{
    public function __construct(Order $order)
    {
        parent::__construct($order);
        $this->value = 'denied';
    }

    public function request(): void
    {
        throw new InvalidStatusTransition('denied', 'requested');
    }

    public function approve(): void
    {
        throw new InvalidStatusTransition('denied', 'approved');
    }

    public function deny(): void
    {
        return;
    }
}