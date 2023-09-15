<?php

namespace unit\state;

use PHPUnit\Framework\TestCase;
use src\state\Order;
use src\state\status\ApprovedOrderStatus;
use src\state\status\DeniedOrderStatus;
use src\state\status\StatusFactory;

class InProgressStatusTest extends TestCase
{
    public function testPossibleTransitions()
    {
        $order = Order::create();

        $order->status->approve();
        static::assertInstanceOf(ApprovedOrderStatus::class, $order->status);
        static::assertEquals("approved", $order->status->value);

        $order = Order::create();

        $order->status->deny();
        static::assertInstanceOf(DeniedOrderStatus::class, $order->status);
        static::assertEquals("denied", $order->status->value);
    }
}
