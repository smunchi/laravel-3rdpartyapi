<?php

namespace App\Services\Lender\Request;

class Contact
{
    public $homePhone;
    public $workPhone;
    public $workExtension;
    public $mobilePhone;
    public $emailHome;
    public $emailOther;
    public $preferredContactMechanism;

    public function __construct(
        $homePhone,
        $mobilePhone,
        $emailHome
    ) {
        $this->homePhone = $homePhone;
        $this->mobilePhone = $mobilePhone;
        $this->emailHome = $emailHome;
    }
}
