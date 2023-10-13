<?php

namespace src\chainOfResponsibility;

use RuntimeException;

class PixEmail implements PixKey {
    public function __construct(public readonly string $value) {
    }

    public function validate(): bool {
        return preg_match("/.*@.*/", $this->value);
    }
}
