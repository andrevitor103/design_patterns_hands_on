<?php
namespace src\chainOfResponsibility;
use RuntimeException;

class PixDocument implements PixKey {
    public function __construct(public readonly string $value) {
    }

    public function validate(): bool {
        $len = strlen($this->value);
        return $len == 11 || $len == 14;
    }
}
