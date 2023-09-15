<?php

namespace src\state\status;

use src\state\Order;

final class StatusFactory
{
    public static function create(Order $order, string $value): OrderStatus
    {
        if ($value == 'in_progress') {
            return new InProgressOrderStatus($order);
        }

        if ($value == 'requested') {
            return new RequestedOrderStatus($order);
        }

        if ($value == 'approved') {
            return new ApprovedOrderStatus($order);
        }

        if ($value == 'denied') {
            return new DeniedOrderStatus($order);
        }
        throw new \RuntimeException('Unknown status');
    }
}