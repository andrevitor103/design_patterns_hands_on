<?php

namespace src\state;
abstract class Status
{
    public string $value;

    public function __construct()
    {
    }
    abstract public function request(): void;
    abstract public function approve(): void;
    abstract public function deny(): void;
}