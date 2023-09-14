<?php
namespace src\state;

class ApprovedStatus extends Status
{
    public function __construct()
    {
        parent::__construct();
        $this->value = 'approved';
    }

    public function request(): void
    {
        throw new InvalidStatusTransition('approved', 'requested');
    }

    public function approve(): void
    {
        return;
    }

    public function deny(): void
    {
        throw new InvalidStatusTransition('approved', 'denied');
    }
}