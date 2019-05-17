<?php

namespace App\Services\Lender\Api;

class LenderResponse
{
    public $apr;
    public $flatRate;
    public $monthlyPayment;
    public $totalInterest;
    public $totalPayable;
    public $adminFee;
    public $costOfCredit;
    public $status;
    public $redirectUrl;

    public function __construct($status)
    {
        $this->status = $status;
    }

    /**
     * @return mixed
     */
    public function getApr()
    {
        return $this->apr;
    }

    /**
     * @param mixed $apr
     */
    public function setApr($apr): void
    {
        $this->apr = $apr;
    }

    /**
     * @return mixed
     */
    public function getFlatRate()
    {
        return $this->flatRate;
    }

    /**
     * @param mixed $flatRate
     */
    public function setFlatRate($flatRate): void
    {
        $this->flatRate = $flatRate;
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

    /**
     * @return mixed
     */
    public function getTotalInterest()
    {
        return $this->totalInterest;
    }

    /**
     * @param mixed $totalInterest
     */
    public function setTotalInterest($totalInterest): void
    {
        $this->totalInterest = $totalInterest;
    }

    /**
     * @return mixed
     */
    public function getTotalPayable()
    {
        return $this->totalPayable;
    }

    /**
     * @param mixed $totalPayable
     */
    public function setTotalPayable($totalPayable): void
    {
        $this->totalPayable = $totalPayable;
    }

    /**
     * @return mixed
     */
    public function getAdminFee()
    {
        return $this->adminFee;
    }

    /**
     * @param mixed $adminFee
     */
    public function setAdminFee($adminFee): void
    {
        $this->adminFee = $adminFee;
    }

    /**
     * @return mixed
     */
    public function getCostOfCredit()
    {
        return $this->costOfCredit;
    }

    /**
     * @param mixed $costOfCredit
     */
    public function setCostOfCredit($costOfCredit): void
    {
        $this->costOfCredit = $costOfCredit;
    }

    /**
     * @return mixed
     */
    public function getRedirectUrl()
    {
        return $this->redirectUrl;
    }

    /**
     * @param mixed $redirectUrl
     */
    public function setRedirectUrl($redirectUrl): void
    {
        $this->redirectUrl = $redirectUrl;
    }

    public function getStatus()
    {
        return $this->status;
    }
}
