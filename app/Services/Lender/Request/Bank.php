<?php

namespace App\Services\Lender\Request;

class Bank
{
    public $accountNumber;
    public $sortCode;
    public $yearsAtBank;
    public $monthsAtBank;

    public function __construct(
        $accountNumber,
        $sortCode
    ) {
        $this->accountNumber = $accountNumber;
        $this->sortCode = $sortCode;
    }
}
