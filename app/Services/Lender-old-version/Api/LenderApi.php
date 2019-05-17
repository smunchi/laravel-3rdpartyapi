<?php

namespace App\Services\Lender\Api;

use App\Services\Lender\Request\LenderRequest;

abstract class LenderApi
{
    public $request;

    abstract protected function authenticate();
    abstract protected function sendRequest();
    abstract protected function getResponse();

    public function __construct(LenderRequest $lenderRequest)
    {
        $this->request = $lenderRequest;
    }
}