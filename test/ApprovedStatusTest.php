<?php

use PHPUnit\Framework\TestCase;
use src\state\InvalidStatusTransition;
use src\state\Status;
use src\state\StatusFactory;

class ApprovedStatusTest extends TestCase
{
    private Status $status;
    protected function setUp(): void
    {
        parent::setUp();
        $this->status = StatusFactory::create('approved');
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
