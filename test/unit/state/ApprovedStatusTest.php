<?php

namespace unit\state;

use PHPUnit\Framework\TestCase;
use src\state\Order;
use src\state\status\InvalidStatusTransition;
use src\state\status\OrderStatus;
use src\state\status\StatusFactory;

class ApprovedStatusTest extends TestCase
{
    private OrderStatus $status;

    protected function setUp(): void
    {
        parent::setUp();
        $order = static::createMock(Order::class);
        $this->status = StatusFactory::create($order, 'approved');
    }

    public function testIdempotency()
    {
        $this->status->approve();
        static::assertEquals("approved", $this->status->value);
    }

    public function testNotPossibleTransitionBetweenApprovedToRequested()
    {
        static::expectException(InvalidStatusTransition::class);
        static::expectExceptionMessage("Invalid status transition: 'approved' to 'requested'");
        $this->status->request();
    }

    public function testNotPossibleTransitionBetweenApprovedToDenied()
    {
        static::expectException(InvalidStatusTransition::class);
        static::expectExceptionMessage("Invalid status transition: 'approved' to 'denied'");
        $this->status->deny();
    }
}
