<?php
namespace A2billingApi\Domain\ValueObjects;

use A2billingApi\Subscription;
use DateTime;

class CreatePaymentRequest
{
    /**
     * @var Subscription
     */
    private $subscription;

    /**
     * @var float
     */
    private $creditValue;

    /**
     * @var string
     */
    private $method;

    /**
     * @var float
     */
    private $payedAmount;

    /**
     * @var DateTime
     */
    private $dateOfPurchase;

    /**
     * @var int
     */
    private $quantity;

    /**
     * @param Subscription $subscription
     * @param float        $creditValue
     * @param float        $payedAmount
     * @param int          $quantity
     * @param string       $method
     */
    public function __construct(
        Subscription $subscription,
        $creditValue,
        $payedAmount,
        $quantity,
        $method
    ) {
        $this->subscription = $subscription;
        $this->creditValue  = $creditValue;
        $this->method       = $method;
        $this->payedAmount  = $payedAmount;
        $this->quantity     = $quantity;

        $this->dateOfPurchase = new DateTime();
    }

    /**
     * @return DateTime
     */
    public function getDateOfPurchase()
    {
        return $this->dateOfPurchase;
    }

    /**
     * @return int
     */
    public function getQuantity()
    {
        return $this->quantity;
    }

    /**
     * @param DateTime $dateOfPurchase
     *
     * @return $this
     */
    public function setDateOfPurchase(DateTime $dateOfPurchase)
    {
        $this->dateOfPurchase = $dateOfPurchase;

        return $this;
    }

    /**
     * @return Subscription
     */
    public function getSubscription()
    {
        return $this->subscription;
    }

    /**
     * @return float
     */
    public function getCreditValue()
    {
        return $this->creditValue;
    }

    /**
     * @return float
     */
    public function getPayedAmount()
    {
        return $this->payedAmount;
    }

    /**
     * @return string
     */
    public function getMethod()
    {
        return $this->method;
    }
}
