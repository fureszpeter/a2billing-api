<?php
namespace A2billingApi\Domain\ValueObjects;

class CreateSubscriptionRequest
{
    /**
     * @var string
     */
    private $pin;

    /**
     * @var int
     */
    private $package;

    /**
     * @var string
     */
    private $password;

    /**
     * @var string
     */
    private $userAlias;

    /**
     * @var string
     */
    private $firstName;

    /**
     * @var string
     */
    private $lastName;

    /**
     * @var string
     */
    private $address;

    /**
     * @var string
     */
    private $city;

    /**
     * @var string
     */
    private $state;

    /**
     * @var string
     */
    private $country;

    /**
     * @var string
     */
    private $zipCode;

    /**
     * @var string
     */
    private $email;

    /**
     * @var string
     */
    private $currency;

    /**
     * @param string $pin
     * @param string $userAlias
     * @param string $password
     * @param int    $package
     * @param string $firstName
     * @param string $lastName
     * @param string $address
     * @param string $city
     * @param string $state
     * @param string $country
     * @param string $zipCode
     * @param string $email
     * @param string $currency
     */
    public function __construct(
        $pin,
        $userAlias,
        $password,
        $package,
        $firstName,
        $lastName,
        $address,
        $city,
        $state,
        $country,
        $zipCode,
        $email,
        $currency
    ) {
        $this->pin       = $pin;
        $this->package   = $package;
        $this->password  = $password;
        $this->userAlias = $userAlias;
        $this->firstName = $firstName;
        $this->lastName  = $lastName;
        $this->address   = $address;
        $this->city      = $city;
        $this->state     = $state;
        $this->country   = $country;
        $this->zipCode   = $zipCode;
        $this->email     = $email;
        $this->currency  = $currency;
    }

    /**
     * @return string
     */
    public function getPin()
    {
        return $this->pin;
    }

    /**
     * @return int
     */
    public function getPackage()
    {
        return $this->package;
    }

    /**
     * @return string
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @return string
     */
    public function getUserAlias()
    {
        return $this->userAlias;
    }

    /**
     * @return string
     */
    public function getFirstName()
    {
        return $this->firstName;
    }

    /**
     * @return string
     */
    public function getLastName()
    {
        return $this->lastName;
    }

    /**
     * @return string
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * @return string
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * @return string
     */
    public function getState()
    {
        return $this->state;
    }

    /**
     * @return string
     */
    public function getCountry()
    {
        return $this->country;
    }

    /**
     * @return string
     */
    public function getZipCode()
    {
        return $this->zipCode;
    }

    /**
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @return string
     */
    public function getCurrency()
    {
        return $this->currency;
    }
}
