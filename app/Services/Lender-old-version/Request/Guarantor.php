<?php


namespace App\Services\Lender\Request;

class Guarantor
{
    public $gTitle;
    public $gFirstName;
    public $gLastName;
    public $gDOB;
    public $gAddress;
    public $gPostTown;
    public $gPostCode;
    public $gEmail;
    public $gmobileTel;
    public $gdayTimeTel;
    public $gMonthlyIncome;
    public $gMonthlyMortgageOrRent;
    public $gEmploymentType;
    public $gBankAccName;
    public $gBankAccSortCode;
    public $gbankAccNumber;
    public $gResidentialStatus;

    public function __construct(
        $gTitle,
        $gFirstName,
        $gLastName,
        $gDOB,
        $gAddress,
        $gPostTown,
        $gPostCode,
        $gEmail,
        $gMobileTel,
        $gMonthlyIncome,
        $gMonthlyMortgageOrRent,
        $gEmploymentType,
        $gBankAccName,
        $gBankAccSortCode,
        $gBankAccNumber
    ) {
        $this->gTitle = $gTitle;
        $this->gFirstName = $gFirstName;
        $this->gLastName = $gLastName;
        $this->gDOB = $gDOB;
        $this->gAddress = $gAddress;
        $this->gPostTown = $gPostTown;
        $this->gPostCode = $gPostCode;
        $this->gEmail = $gEmail;
        $this->gmobileTel = $gMobileTel;
        $this->gMonthlyIncome = $gMonthlyIncome;
        $this->gMonthlyMortgageOrRent = $gMonthlyMortgageOrRent;
        $this->gEmploymentType = $gEmploymentType;
        $this->gBankAccName = $gBankAccName;
        $this->gBankAccSortCode = $gBankAccSortCode;
        $this->gbankAccNumber = $gBankAccNumber;
    }
}
