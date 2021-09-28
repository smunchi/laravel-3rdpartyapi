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
    public $credential;

    public function __construct(
        Application $application,
        Customer $customer,
        Address $address,
        Bank $bank,
        Credential $credential
    ) {
        $this->application = $application;
        $this->customer = $customer;
        $this->address = $address;
        $this->bank = $bank;
        $this->credential = $credential;
    }
}
