<?php
namespace A2billingApi\Domain\ValueObjects;

use Furesz\TypeChecker\TypeChecker;
use UnexpectedValueException;

class Email
{
    /**
     * @var string
     */
    private $email;

    /**
     * @param string $email
     */
    public function __construct($email)
    {
        $this->assertEmailValid($email);

        $this->email = $email;
    }

    /**
     * @param string $email
     *
     * @throws UnexpectedValueException If email is invalid.
     */
    private function assertEmailValid($email)
    {
        TypeChecker::assertString($email, '$email');

        if ( ! filter_var($email, FILTER_VALIDATE_EMAIL)) {
            throw new UnexpectedValueException(
                sprintf('Email is invalid. [email: %s]', $email)
            );
        }
    }

    public function __toString()
    {
        return $this->getEmail();
    }

    /**
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }
}
