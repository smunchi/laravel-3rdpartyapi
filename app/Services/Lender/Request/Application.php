<?php

namespace App\Services\Lender\Request;

class Application
{
    public $loanAmount;
    public $loanTerm;
    public $purpose;

    public function __construct(
        $loanAmount,
        $loanTerm,
        $purpose
    ) {
        $this->loanAmount = $loanAmount;
        $this->loanTerm = $loanTerm;
        $this->purpose = $purpose;
    }
}
