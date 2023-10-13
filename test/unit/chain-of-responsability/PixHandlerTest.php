<?php

namespace unit\chainOfResponsibility;

use PHPUnit\Framework\TestCase;
use RuntimeException;
use src\chainOfResponsibility\PixDocument;
use src\chainOfResponsibility\PixEmail;
use src\chainOfResponsibility\PixHandler;
use src\chainOfResponsibility\PixPhone;

class PixHandlerTest extends TestCase {
    public function testShouldNotCreatePixWhenInvalidKey() {
        static::expectException(RuntimeException::class);
        static::expectExceptionMessage('Pix Key is invalid');

        $testValue = "1234";

        $pix = ( new PixHandler(new PixDocument($testValue)) )
                ->handler(new PixPhone($testValue))
                ->handler(new PixEmail($testValue))
                ->handler(null)
                ->key;
        static::assertInstanceOf(PixDocument::class, $pix);
    }

    public function testShouldCreatePixWhenKeyIsAEmail() {
        $testValue = "andrevitor103@gmail.com";
        $pix = ( new PixHandler(new PixDocument($testValue)) )
            ->handler(new PixPhone($testValue))
            ->handler(new PixEmail($testValue))
            ->handler(null)
            ->key;
        static::assertInstanceOf(PixEmail::class, $pix);
    }

    public function testShouldCreatePixWhenKeyIsAPhone() {
        $testValue = "123456789";

        $pix = ( new PixHandler(new PixDocument($testValue)) )
                ->handler(new PixPhone($testValue))
                ->handler(new PixEmail($testValue))
                ->handler(null)
                ->key;

        static::assertInstanceOf(PixPhone::class, $pix);
    }

    public function testShouldCreatePixWhenKeyIsACpf() {
        $testValue = "12345678901";
        $pix = ( new PixHandler(new PixDocument($testValue)) )
            ->handler(new PixPhone($testValue))
            ->handler(new PixEmail($testValue))
            ->handler(null)
            ->key;
        static::assertInstanceOf(PixDocument::class, $pix);
    }

    public function testShouldCreatePixWhenKeyIsACnpj() {
        $testValue = "12345678901234";
        $pix = ( new PixHandler(new PixDocument($testValue)) )
            ->handler(new PixPhone($testValue))
            ->handler(new PixEmail($testValue))
            ->handler(null)
            ->key;
        static::assertInstanceOf(PixDocument::class, $pix);
    }
}
