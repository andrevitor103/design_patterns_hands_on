<?php
namespace src\state\status;

use src\state\Order;

class RequestedOrderStatus extends OrderStatus
{
    public function __construct(Order $order)
    {
        parent::__construct($order);
        $this->value = 'requested';
    }

    public function request(): void
    {
        return;
    }

    public function approve(): void
    {
        $this->order->status = new ApprovedOrderStatus();
    }

    public function deny(): void
    {
        $this->order->status = new DeniedOrderStatus();
    }
}