<?php

namespace App\Services\Lender\Api;

use App\Services\Lender\Request\LenderRequest;

abstract class LenderApi
{
    public $request;

    abstract protected function submitApplication(): LenderResponse;

    public function __construct(LenderRequest $lenderRequest)
    {
        $this->request = $lenderRequest;
    }
}
