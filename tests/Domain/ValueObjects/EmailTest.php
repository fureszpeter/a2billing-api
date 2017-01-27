<?php
namespace A2billingApi\Domain\ValueObjects;

use InvalidArgumentException;
use TestCase;
use UnexpectedValueException;

class EmailTest extends TestCase
{

    /**
     * @dataProvider validEmailProvider
     *
     * @param string $email
     */
    public function test_can_create_valid_email($email)
    {
        $emailVO = new Email($email);

        $this->assertEquals($email, (string) $emailVO);
    }

    public function test_throw_exception_on_non_string()
    {
        $this->expectException(InvalidArgumentException::class);

        new Email(123);
    }

    /**
     * @dataProvider invalidEmailProvider
     *
     * @param string $email
     */
    public function test_throw_exception_on_invalid_email($email)
    {
        $this->expectException(UnexpectedValueException::class);

        new Email($email);
    }

    /**
     * @return array
     */
    public function validEmailProvider()
    {
        return [
            ['info@4call.us'],
            ['info-still-valid@4call.us'],
        ];
    }

    /**
     * @return array
     */
    public function invalidEmailProvider()
    {
        return [
            ['info'],
            ['info@'],
        ];
    }
}

