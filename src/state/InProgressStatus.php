<?php
namespace src\state;

class InProgressStatus extends Status
{
    public function __construct()
    {
        parent::__construct();
        $this->value = 'in_progress';
    }

    public function request(): void
    {
        throw new InvalidStatusTransition('in_progress', 'requested');
    }

    public function approve(): void
    {
        $this->value = 'approved';
    }

    public function deny(): void
    {
        $this->value = 'denied';
    }
}