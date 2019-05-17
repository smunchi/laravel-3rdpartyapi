<?php

namespace App\Services\Lender\Request;

class Employment
{
    public $jobTitle;
    public $employerName;
    public $startDate;
    public $yearsAtEmployer;
    public $monthsAtEmployer;
    public $timeWithCompany;
    public $paymentFrequency;
    public $paymentMethod;
    public $incomeMethodType;
    public $companyMainPhone;
    public $universityName;

    public function __construct(
        $paymentMethodType,
        $paymentFrequency
    ) {
        $this->paymentMethodType = $paymentMethodType;
        $this->paymentFrequency = $paymentFrequency;
    }
}
