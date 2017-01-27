<?php
namespace A2billingApi\Domain\ValueObjects;

use JsonSerializable;

class Country implements JsonSerializable
{
    private $iso3;

    private $name;

    /**
     * @param $iso3
     * @param $name
     */
    public function __construct($iso3, $name)
    {
        $this->iso3 = $iso3;
        $this->name = $name;
    }

    /**
     * @return array
     */
    public function jsonSerialize()
    {
        return [
            'iso3' => $this->getIso3(),
            'name' => $this->getName(),
        ];
    }

    /**
     * @return mixed
     */
    public function getIso3()
    {
        return $this->iso3;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

}
