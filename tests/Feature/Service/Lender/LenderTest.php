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
        $loanAmount = 100;
        $loanTerm = 3;
        $purpose = 'Car Purchase';
        $isSpeculative = true;
        $isInteractive = true;
        $hasConsentedToCreditSearch = true;
        $hasConsentedForDataSharing = false;
        $application = new Application(
            $loanAmount,
            $loanTerm,
            $purpose,
            $isSpeculative,
            $isInteractive,
            $hasConsentedToCreditSearch,
            $hasConsentedForDataSharing
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
        $houseName = 'haqute vila';
        $houseNumber = '12';
        $flat = '20';
        $roadName = 'adabor thana';
        $city = 'Dhaka';
        $postCode = 'RM9 6AN';
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

        $paymentMethodType = 'Cash';
        $paymentFrequency = 'Weekly';
        $employment = new Employment($paymentMethodType, $paymentFrequency);


        $netMonthlyIncome = '200';
        $hasCreditCards = true;
        $hasDebitCards = false;
        $hasExistingLoans = true;
        $monthlyMortgage = '20';
        $otherMonthlyExpenses = '29';
        $incomeExpense = new IncomeExpense(
            $netMonthlyIncome,
            $hasCreditCards,
            $hasDebitCards,
            $hasExistingLoans,
            $monthlyMortgage,
            $otherMonthlyExpenses
        );

        $gTitle = 'Mr';
        $gFirstName = 'rawshan';
        $gLastName = 'ali';
        $gDOB = '1988-09-09';
        $gAddress = 'khulna';
        $gPostTown = 'khulna';
        $gPostCode = 'RM9 6AN';
        $gEmail = 'salah_cse_mbstu@yahoo.com';
        $gMobileTel = '01224478782';
        $gMonthlyIncome = '300';
        $gMonthlyMortgageOrRent = '2';
        $gEmploymentType = 'PartTimeEmployed';
        $gBankAccName = 'Md Rawshan';
        $gBankAccSortCode = '12-34-56';
        $gBankAccNumber = '123456';
        $guarantor = new \App\Services\Lender\Request\Guarantor(
            $gTitle,
            $gFirstName,
            $gLastName,
            $gDOB,
            $gAddress,
            $gPostTown,
            $gPostCode,
            $gEmail,
            $gMobileTel,
            $gMonthlyIncome,
            $gMonthlyMortgageOrRent,
            $gEmploymentType,
            $gBankAccName,
            $gBankAccSortCode,
            $gBankAccNumber
        );


        $homePhone = '01224478782';
        $mobilePhone = '01224478780';
        $emailHome = 'salah_cse_mbstu@yahoo.com';
        $contact = new Contact(
            $homePhone,
            $mobilePhone,
            $emailHome
        );

        $commsPreferences = new CommsPreferences();

        $request = new LenderRequest(
            $application,
            $customer,
            $address,
            $bank,
            $employment,
            $incomeExpense,
            $guarantor,
            $contact,
            $commsPreferences
        );

        $apiCredentials = Lender::where(['name'=>'Rutherford Ltd'])->first()->api_credentials;

        $api = new Guarantor($request, $apiCredentials);

        $response = $api->submitApplication();

        $this->assertInstanceOf(LenderResponse::class, $response);
        $this->assertNotNull($response->getRedirectUrl());
        $this->assertEquals('Fully Approved', $response->getStatus());
    }
}
