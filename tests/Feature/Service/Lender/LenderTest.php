<?php

namespace Tests\Service\Service\Lender;

use App\Services\Lender\Api\Guarantor\Guarantor;
use App\Services\Lender\Api\LenderResponse;
use App\Services\Lender\Request\Address;
use App\Services\Lender\Request\Bank;
use App\Services\Lender\Request\Credential;
use App\Services\Lender\Request\Customer;
use App\Services\Lender\Request\LenderRequest;
use App\Services\Lender\Request\Application;
use PHPUnit\Framework\TestCase;

class LenderTest extends TestCase
{
    public function testGuarantorLender()
    {
        $application = new Application(
            2000,
            3,
            'Shopping'
        );

        $customer = new Customer(
            'Mr',
            'john',
            'smith',
            '1986-11-05',
            'Male',
            'Married',
            'FullTimeEmployed',
            3
        );

        $address = new Address(
            'Homeowner',
            '37',
            'east vila',
            '10',
            '20',
            'mona road',
            'Dhaka',
            'CM9 4CS'
        );

        $bank = new Bank(
            '12-34-56',
            '123456'
        );

        $credential = new Credential(
            [
                "uri"=> "",
                "applicantType"=> "Main",
                "key" => "",
                'headers' => [
                    'Content-Type' => 'text/xml; charset=UTF8',
                ]
            ]
        );

        $request = new LenderRequest(
            $application,
            $customer,
            $address,
            $bank,
            $credential
        );

        $api = new Guarantor($request);
        $response = $api->submitApplication();
        $this->assertInstanceOf(LenderResponse::class, $response);
        $this->assertEquals('Approved', $response->getStatus());
    }
}
