<?php
namespace src\state\status;

use src\state\Order;

class InProgressOrderStatus extends OrderStatus
{
    public function __construct(Order $order)
    {
        parent::__construct($order);
        $this->value = 'in_progress';
    }

    public function request(): void
    {
        $this->order->status = new RequestedOrderStatus($this->order);
    }

    public function approve(): void
    {
        $this->order->status = new ApprovedOrderStatus($this->order);
    }

    public function deny(): void
    {
        $this->order->status = new DeniedOrderStatus($this->order);
    }
}