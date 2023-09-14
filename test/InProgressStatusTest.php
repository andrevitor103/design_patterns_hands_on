<?php

use PHPUnit\Framework\TestCase;
use src\state\InProgressStatus;
use src\state\InvalidStatusTransition;
use src\state\StatusFactory;

class InProgressStatusTest extends TestCase
{
    public function testPossibleTransitions()
    {
        $status = StatusFactory::create('in_progress');

        $status->approve();
        static::assertEquals("approved", $status->value);

        $status = new InProgressStatus();

        $status->deny();
        static::assertEquals("denied", $status->value);
    }

    public function testNotPossibleTransitions()
    {
        $status = new InProgressStatus();

        static::expectException(InvalidStatusTransition::class);
        static::expectExceptionMessage("Invalid status transition: 'in_progress' to 'requested'");
        $status->request();
    }
}
