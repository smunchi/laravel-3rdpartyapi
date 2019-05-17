<?php

namespace App\Services\Lender\Request;

use App\Services\Lender\Request\Application;
use App\Services\Lender\Request\Customer;
use App\Services\Lender\Request\Address;
use App\Services\Lender\Request\Bank;
use App\Services\Lender\Request\Employment;
use App\Services\Lender\Request\IncomeExpense;
use App\Services\Lender\Request\Guarantor;
use App\Services\Lender\Request\CommsPreferences;

class LenderRequest
{
    public $application;
    public $customer;
    public $address;
    public $bank;
    public $employment;
    public $incomeExpense;
    public $guarantor;
    public $commsPreferences;
    public $contact;

    public function __construct(
        Application $application,
        Customer $customer,
        Address $address,
        Bank $bank,
        Employment $employment,
        IncomeExpense $incomeExpense,
        Guarantor $guarantor,
        Contact $contact,
        CommsPreferences $commsPreferences
    ) {
        $this->application = $application;
        $this->customer = $customer;
        $this->address = $address;
        $this->bank = $bank;
        $this->employment = $employment;
        $this->incomeExpense = $incomeExpense;
        $this->guarantor = $guarantor;
        $this->contact = $contact;
        $this->commsPreferences = $commsPreferences;
    }
}
