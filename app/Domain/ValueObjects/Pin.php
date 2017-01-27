<?php
namespace A2billingApi\Domain\ValueObjects;

use Furesz\TypeChecker\TypeChecker;
use UnexpectedValueException;

class Pin
{
    /**
     * @var string
     */
    private $pin;

    /**
     * @param string $pin
     *
     */
    public function __construct($pin)
    {
        $this->assertPinValid($pin);
        $this->pin = $pin;
    }

    /**
     * @param $pin
     *
     * @throws UnexpectedValueException If $pin is not string.
     */
    private function assertPinValid($pin)
    {
        TypeChecker::assertString($pin, '$pin');

        if ( ! preg_match('/^[0-9]{10}$/', $pin)) {
            throw new UnexpectedValueException(
                sprintf('Invalid pin received. [pin: %s]', $pin)
            );
        }

    }

    public function __toString()
    {
        return $this->getPin();
    }

    /**
     * @return string
     */
    public function getPin()
    {
        return $this->pin;
    }
}
