<?php

use PHPUnit\Framework\TestCase;
use src\state\InvalidStatusTransition;
use src\state\Status;
use src\state\StatusFactory;

class DeniedStatusTest extends TestCase
{
    private Status $status;
    protected function setUp(): void
    {
        parent::setUp();
        $this->status = StatusFactory::create('denied');
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
