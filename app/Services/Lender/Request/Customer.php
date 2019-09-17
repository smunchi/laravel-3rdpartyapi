<?php

namespace App\Services\Lender\Request;

class Customer
{
    public $title;
    public $firstName;
    public $lastName;
    public $totalDependent;
    public $dob;
    public $gender;
    public $maritalStatus;
    public $employmentStatus;

    public function __construct(
        $title,
        $firstName,
        $lastName,
        $dob,
        $gender,
        $maritalStatus,
        $employmentStatus,
        $totalDependent
    ) {
        $this->title = $title;
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->dob = $dob;
        $this->gender = $gender;
        $this->maritalStatus = $maritalStatus;
        $this->employmentStatus = $employmentStatus;
        $this->totalDependent = $totalDependent;
    }
}
