<?php

namespace src\chainOfResponsibility;

use RuntimeException;

class PixPhone implements PixKey
{
    public function __construct(public readonly string $value) {
    }

    public function validate(): bool {
        return strlen($this->value) == 9;
    }
}
