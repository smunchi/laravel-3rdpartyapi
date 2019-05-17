<?php

namespace App\Services\Lender\Api;

use App\Models\Users\Lender;
use App\Services\Lender\Api\Guarantor\constant;
use App\Services\Lender\Request\LenderRequest;

abstract class LenderApi
{
    public $request;
    public $lender;

    abstract protected function authenticate();
    abstract protected function sendRequest();
    abstract protected function getResponse();

    public function __construct(LenderRequest $lenderRequest)
    {
        $this->request = $lenderRequest;
    }

    public function getAuthInfo()
    {
        $data = Lender::where(['name'=>$this->lender])->first();

        return $data->api_credentials;
    }
}