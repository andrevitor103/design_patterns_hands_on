<?php

namespace unit\state;

use PHPUnit\Framework\TestCase;
use src\state\Order;
use src\state\status\InvalidStatusTransition;
use src\state\status\OrderStatus;
use src\state\status\StatusFactory;

class DeniedStatusTest extends TestCase
{
    private OrderStatus $status;

    protected function setUp(): void
    {
        parent::setUp();
        $order = static::createMock(Order::class);
        $this->status = StatusFactory::create($order, 'denied');
    }

    public function testIdempotency()
    {
        $this->status->deny();
        static::assertEquals("denied", $this->status->value);
    }

    public function testNotPossibleTransitionBetweenDeniedToRequested()
    {
        static::expectException(InvalidStatusTransition::class);
        static::expectExceptionMessage("Invalid status transition: 'denied' to 'requested'");
        $this->status->request();
    }

    public function testNotPossibleTransitionBetweenDeniedToApproved()
    {
        static::expectException(InvalidStatusTransition::class);
        static::expectExceptionMessage("Invalid status transition: 'denied' to 'approved'");
        $this->status->approve();
    }
}
