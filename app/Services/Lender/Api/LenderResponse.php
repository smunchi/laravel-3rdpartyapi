<?php

namespace App\Services\Lender\Api;

class LenderResponse
{
    public $monthlyPayment;
    public $status;

    public function __construct($status)
    {
        $this->status = $status;
    }

    /**
     * @return mixed
     */
    public function getMonthlyPayment()
    {
        return $this->monthlyPayment;
    }

    /**
     * @param mixed $monthlyPayment
     */
    public function setMonthlyPayment($monthlyPayment): void
    {
        $this->monthlyPayment = $monthlyPayment;
    }

    public function getStatus()
    {
        return $this->status;
    }
}
