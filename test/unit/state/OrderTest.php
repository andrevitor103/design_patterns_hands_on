<?php

namespace unit\state;

use PHPUnit\Framework\TestCase;
use src\state\Order;
use src\state\status\ApprovedOrderStatus;
use src\state\status\DeniedOrderStatus;
use src\state\status\InProgressOrderStatus;
use src\state\status\RequestedOrderStatus;

class OrderTest extends TestCase
{
    public function testShouldCreateAOrder()
    {
        $order = Order::create();

        static::assertInstanceOf(InProgressOrderStatus::class, $order->status);
        static::assertEquals('in_progress', $order->status->value);
    }

    public function testShouldRequestAOrder()
    {
        $order = Order::create();

        $order->request();

        static::assertInstanceOf(RequestedOrderStatus::class, $order->status);
        static::assertEquals('requested', $order->status->value);
    }

    public function testShouldApproveAOrder()
    {
        $order = Order::create();

        $order->approve();

        static::assertInstanceOf(ApprovedOrderStatus::class, $order->status);
        static::assertEquals('approved', $order->status->value);
    }

    public function testShouldDenyAOrder()
    {
        $order = Order::create();

        $order->deny();

        static::assertInstanceOf(DeniedOrderStatus::class, $order->status);
        static::assertEquals('denied', $order->status->value);
    }
}
