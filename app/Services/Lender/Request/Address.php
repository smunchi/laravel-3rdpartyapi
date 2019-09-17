<?php

namespace App\Services\Lender\Request;

class Address
{
    public $houseName;
    public $houseNumber;
    public $roadName;
    public $postCode;
    public $flat;
    public $city;

    public function __construct(
        $houseName,
        $houseNumber,
        $flat,
        $roadName,
        $city,
        $postCode
    ) {
        $this->houseName = $houseName;
        $this->houseNumber = $houseNumber;
        $this->flat = $flat;
        $this->roadName = $roadName;
        $this->city = $city;
        $this->postCode = $postCode;
    }
}
