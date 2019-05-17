<?php

namespace App\Services\Lender\Request;

class Application
{
    public $introducerReference;
    public $subAffiliate;
    public $applicationReference;
    public $isSpeculative;
    public $isInteractive;
    public $hasConsentedToCreditSearch;
    public $hasConsentedForDataSharing;
    public $loanAmount;
    public $loanTerm;
    public $loanRepaymentFrequency;
    public $isSecured;
    public $purpose;
    public $product;
    public $campaign;
    public $isPackaged;
    public $customData;
    public $repaymentDay;
    public $repaymentDate;

    public function __construct(
        $loanAmount,
        $loanTerm,
        $isSpeculative,
        $isInteractive,
        $hasConsentedToCreditSearch,
        $hasConsentedForDataSharing
    ) {
        $this->loanAmount = $loanAmount;
        $this->loanTerm = $loanTerm;
        $this->isSpeculative = $isSpeculative;
        $this->isInteractive = $isInteractive;
        $this->hasConsentedToCreditSearch = $hasConsentedToCreditSearch;
        $this->hasConsentedForDataSharing = $hasConsentedForDataSharing;
    }
}
