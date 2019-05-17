<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }
   
    public function testLender()
    {
	$loanAmount = 100;
        $loanTerm = 3;
        $isSpeculative = true;
        $isInteractive = true;
        $hasConsentedToCreditSearch = true;
        $hasConsentedForDataSharing = false;
        $application = new Application(
            $loanAmount,
            $loanTerm,
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


        $houseName = 'haque vila';
        $houseNumber = '12';
        $flat = '20';
        $roadName = 'adabor thana';
        $city = 'Dhaka';
        $postCode = '1213';
        $dateMovedIn = '2019-03-03';
        $address = new Address(
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
        $gMobileTel = '045';
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

        $api = new Guarantor($request);
        $api->formatRequest();
        $api->sendRequest();
        $api->getResponse();
    }
}
