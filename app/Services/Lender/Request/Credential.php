<?php

namespace App\Services\Lender\Request;

class Credential
{
    public $credential;

    public function __construct(
        $credential
    ) {
        $this->credential = $credential;
    }
}
