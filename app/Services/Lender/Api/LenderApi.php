<?php

namespace App\Services\Lender\Api;

use App\Services\Lender\Request\LenderRequest;

abstract class LenderApi
{
    public $request;
    public $credentials;

    abstract protected function submitApplication(): LenderResponse;

    public function __construct(LenderRequest $lenderRequest, $credentials)
    {
        $this->request = $lenderRequest;
        $this->credentials = $credentials;
    }
}