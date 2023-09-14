<?php
namespace src\state;

class DeniedStatus extends Status
{
    public function __construct()
    {
        parent::__construct();
        $this->value = 'denied';
    }

    public function request(): void
    {
        throw new InvalidStatusTransition('denied', 'requested');
    }

    public function approve(): void
    {
        throw new InvalidStatusTransition('denied', 'approved');
    }

    public function deny(): void
    {
        return;
    }
}