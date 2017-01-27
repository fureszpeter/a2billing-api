<?php
namespace A2billingApi\Domain\ValueObjects;

use JsonSerializable;

class Rate implements JsonSerializable
{
    private $destination;

    private $rate;

    private $revenue;

    /**
     * @param $destination
     * @param $rate
     * @param $revenue
     */
    public function __construct($destination, $rate, $revenue)
    {
        $this->destination = $destination;
        $this->rate        = $rate;
        $this->revenue     = $revenue;
    }

    /**
     * @return array
     */
    public function jsonSerialize()
    {
        return [
            'destination' => $this->getDestination(),
            'rate'        => $this->getRate(),
            'revenue'     => $this->getRevenue(),
        ];
    }

    /**
     * @return mixed
     */
    public function getDestination()
    {
        return $this->destination;
    }

    /**
     * @return mixed
     */
    public function getRate()
    {
        return $this->rate;
    }

    /**
     * @return mixed
     */
    public function getRevenue()
    {
        return $this->revenue;
    }
}
