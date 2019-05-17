<?php

namespace App\Services\Lender\Request;

class Address
{
    public $houseName;
    public $houseNumber;
    public $roadName;
    public $roadNumber;
    public $postCode;
    public $flat;
    public $city;
    public $country;
    public $monthAtAddress;
    public $residentialStatus;
    public $dateMovedIn;
    public $previousAddressPostCode;
    public $previousAddressHouseNameOrNumber;

    public function __construct(
        $houseName,
        $houseNumber,
        $flat,
        $roadName,
        $city,
        $postCode,
        $dateMovedIn
    ) {
        $this->houseName = $houseName;
        $this->houseNumber = $houseNumber;
        $this->flat = $flat;
        $this->roadName = $roadName;
        $this->city = $city;
        $this->postCode = $postCode;
        $this->dateMovedIn = $dateMovedIn;
    }
}
