<?php

namespace Tests\Service\Service\Lender;

use App\Models\Users\Lender;
use App\Services\Lender\Api\Guarantor\Guarantor;
use App\Services\Lender\Api\LenderResponse;
use App\Services\Lender\Request\Address;
use App\Services\Lender\Request\Bank;
use App\Services\Lender\Request\CommsPreferences;
use App\Services\Lender\Request\Contact;
use App\Services\Lender\Request\Customer;
use App\Services\Lender\Request\Employment;
use App\Services\Lender\Request\IncomeExpense;
use App\Services\Lender\Request\LenderRequest;
use App\Services\Lender\Request\Application;
use Tests\TestCase;

class LenderTest extends TestCase
{
    public function testGuarantorLender()
    {
        $loanAmount = 2000;
        $loanTerm = 3;
        $purpose = 'Shopping';
        $application = new Application(
            $loanAmount,
            $loanTerm,
            $purpose
        );

        $title = 'Mr';
        $firstName = 'john';
        $lastName = 'smith';
        $dob = '1986-11-05';
        $gender = 'Male';
        $maritalStatus = 'Married';
        $employmentStatus = 'FullTimeEmployed';
        $totalDependent = 3;
        $customer = new Customer(
            $title,
            $firstName,
            $lastName,
            $dob,
            $gender,
            $maritalStatus,
            $employmentStatus,
            $totalDependent
        );

        $residentialStatus = 'Homeowner';
        $monthAtAddress = '37';
        $houseName = 'east vila';
        $houseNumber = '10';
        $flat = '20';
        $roadName = 'mona road';
        $city = 'Dhaka';
        $postCode = 'CM9 4CS';
        $dateMovedIn = '2019-03-03';
        $address = new Address(
            $residentialStatus,
            $monthAtAddress,
            $houseName,
            $houseNumber,
            $flat,
            $roadName,
            $city,
            $postCode,
            $dateMovedIn
        );

        $accountNumber = '12-34-56';
        $sortCode = '123456';
        $bank = new Bank(
            $accountNumber,
            $sortCode
        );

        $request = new LenderRequest(
            $application,
            $customer,
            $address,
            $bank
        );

        $apiCredentials = array("uri"=> "", "applicantType"=> "Main");

        $api = new Guarantor($request, $apiCredentials);
        $response = $api->submitApplication();
        $this->assertInstanceOf(LenderResponse::class, $response);
        $this->assertEquals('Approved', $response->getStatus());
    }
}
