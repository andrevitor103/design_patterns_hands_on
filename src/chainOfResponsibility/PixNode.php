<?php

namespace src\chainOfResponsibility;

use RuntimeException;

class PixNode {
    public function __construct(public ?PixKey $key = null)
    {
    }

    public function handler(?PixKey $key): ?PixNode {
        if ( $this->key->validate() ) {
            return $this;
        }
        if (!$key) {
            throw new RuntimeException('Pix Key is invalid');
        }
        return new PixNode($key);
    }
}
