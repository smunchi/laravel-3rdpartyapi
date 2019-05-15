<?php

namespace App\Services\Lender\Request;

class IncomeExpense
{
    public $netMonthlyIncome;
    public $hasCreditCards;
    public $hasDebitCards;
    public $hasExistingLoans;
    public $monthlyMortgage;
    public $otherMonthlyExpenses;
    public $householdIncome;
    public $foodOrHouseholdCost;
    public $utilitiesCost;
    public $transportCost;
    public $monthlyCreditCommitment;
    public $carOwner;
    public $sourceOfIncome;
    public $firstIncomeDate;

    public function __construct(
        $netMonthlyIncome,
        $hasCreditCards,
        $hasDebitCards,
        $hasExistingLoans,
        $monthlyMortgage,
        $otherMonthlyExpenses
    ) {
        $this->netMonthlyIncome = $netMonthlyIncome;
        $this->hasCreditCards = $hasCreditCards;
        $this->hasDebitCards = $hasDebitCards;
        $this->hasExistingLoans = $hasExistingLoans;
        $this->monthlyMortgage = $monthlyMortgage;
        $this->otherMonthlyExpenses = $otherMonthlyExpenses;
    }
}
