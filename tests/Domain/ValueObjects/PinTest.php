<?php
namespace A2billingApi\Domain\ValueObjects;

use InvalidArgumentException;
use TestCase;
use UnexpectedValueException;

class PinTest extends TestCase
{

    /**
     * @dataProvider validPinProvider
     *
     * @param string $pin
     */
    public function test_valid_pin_can_be_set($pin)
    {
        $pinVo = new Pin($pin);

        $this->assertEquals($pin, (string)$pinVo);
    }

    public function test_only_accept_string()
    {
        $this->expectException(InvalidArgumentException::class);

        new Pin(123);
    }

    /**
     * @dataProvider invalidPinProvider
     *
     * @param string $pin
     */
    public function test_invalid_pin_throws_exception($pin)
    {
        $this->expectException(UnexpectedValueException::class);

        new Pin($pin);
    }

    /**
     * @return array
     */
    public function validPinProvider()
    {
        return [
            ['1234567890'],
            ['0123456789'],
        ];
    }

    /**
     * @return array
     */
    public function invalidPinProvider()
    {
        return [
            ['123456789A'],
            ['012345678'],
        ];
    }
}

