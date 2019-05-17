<?php

namespace App\Services\Lender\Request;

class Bank
{
    public $accountName;
    public $accountNumber;
    public $sortCode;
    public $bankName;
    public $branchName;
    public $yearsAtBank;
    public $monthsAtBank;
    public $supportsDirectDebit;
    public $isCurrentAccount;

    public function __construct(
        $accountNumber,
        $sortCode
    ) {
        $this->accountNumber = $accountNumber;
        $this->sortCode = $sortCode;
    }
}
