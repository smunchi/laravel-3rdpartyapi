<?php

namespace App\Services\Lender\Api\Guarantor;

use App\Services\Lender\Api\LenderApi;
use GuzzleHttp\Client;

class Guarantor extends LenderApi
{
    public function authenticate()
    {
        return true;
    }

    public function sendRequest()
    {
        $dob = explode('-', $this->request->customer->dob);
        $year = $dob[0];
        $month = $dob[1];
        $day = $dob[2];

        $xml = '<?xml version="1.0" encoding="ISO-8859-1"?>';
        $xml = '<data><lead>';
        $xml .= '<key>' . $this->request->application->key . '</key>';
        $xml .= '<leadgroup>' . $this->request->application->leadGroup . '</leadgroup>';
        $xml .= '<introducer>' . $this->request->application->introducerReference . '</introducer>';
        $xml .= '<status>' . $this->request->application->status . '</status>';
        $xml .= '<reference>' . $this->request->application->applicationReference . '</reference>';
        $xml .= '<source>' . $this->request->application->applicationReference . '</source>';
        $xml .= '<title>' . $this->request->customer->title . '</title>';
        $xml .= '<firstname>' . $this->request->customer->firstName . '</firstname>';
        $xml .= '<lastname>' . $this->request->customer->lastName . '</lastname>';
        $xml .= '<phone1>' . $this->request->contact->mobilePhone. '</phone1>';
        $xml .= '<phone2>' . $this->request->contact->homePhone. '</phone2>';
        $xml .= '<email>' . $this->request->contact->emailHome . '</email>';
        $xml .= '<towncity>' . $this->request->address->city . '</towncity>';
        $xml .= '<postcode>' . $this->request->address->postCode . '</postcode>';
        $xml .= '<dobday>' . $day . '</dobday>';
        $xml .= '<dobmonth>' . $month . '</dobmonth>';
        $xml .= '<dobyear>' . $year . '</dobyear>';
        $xml .= '<data1>' . $this->request->application->loanAmount . '</data1>';
        $xml .= '<data2>' . $this->request->application->loanTerm . '</data2>';
        $xml .= '<data3>' . $this->request->application->purpose . '</data3>';
        $xml .= '<data5>' . $this->request->address->residentialStatus . '</data5>';
        $xml .= '<data6>' . $this->request->address->monthAtAddress . '</data6>';
        $xml .= '<data7>' . $this->request->address->previousAddressPostCode . '</data7>';
        $xml .= '<data8>' . $this->request->address->previousAddressHouseNameOrNumber . '</data8>';
        $xml .= '<data9>' . $this->request->bank->sortCode . '</data9>';
        $xml .= '<data10>' . $this->request->bank->accountNumber . '</data10>';
        $xml .= '<data11>' . $this->request->customer->employmentStatus . '</data11>';
        $xml .= '<data12>' . $this->request->employment->employerName . '</data12>';
        $xml .= '<data13>' . $this->request->employment->yearsAtEmployer . '</data13>';
        $xml .= '<data14>' . $this->request->employment->monthsAtEmployer . '</data14>';
        $xml .= '<data15>' . $this->request->contact->workPhone . '</data15>';
        $xml .= '<data16>' . $this->request->employment->paymentFrequency . '</data16>';
        $xml .= '<data17>' . $this->request->incomeExpense->netMonthlyIncome . '</data17>';
        $xml .= '<data18>' . $this->request->incomeExpense->householdIncome . '</data18>';
        $xml .= '<data19>' . $this->request->incomeExpense->monthlyMortgage . '</data19>';
        $xml .= '<data20>' . $this->request->incomeExpense->monthlyCreditCommitment . '</data20>';
        $xml .= '<data21>' . $this->request->incomeExpense->foodOrHouseholdCost . '</data21>';
        $xml .= '<data22>' . $this->request->incomeExpense->utilitiesCost . '</data22>';
        $xml .= '<data23>' . $this->request->incomeExpense->transportCost . '</data23>';
        $xml .= '<data24>' . $this->request->incomeExpense->otherMonthlyExpenses . '</data24>';
        $xml .= '<data25>' . $this->request->guarantor->gTitle . '</data25>';
        $xml .= '<data26>' . $this->request->guarantor->gFirstName . '</data26>';
        $xml .= '<data27>' . $this->request->guarantor->gLastName . '</data27>';
        $xml .= '<data29>' . $this->request->guarantor->gdayTimeTel . '</data29>';
        $xml .= '<data30>' . $this->request->guarantor->gmobileTel . '</data30>';
        $xml .= '<data31>' . $this->request->guarantor->gEmail . '</data31>';
        $xml .= '<data39>' . $this->request->guarantor->gResidentialStatus . '</data39>';
        $xml .= '<contactphone>' . $this->request->commsPreferences->byPhone . '</contactphone>';
        $xml .= '<contactsms>' . $this->request->commsPreferences->bySMS . '</contactsms>';
        $xml .= '<contactemail>' . $this->request->commsPreferences->byEmail . '</contactemail>';
        $xml .= '</lead>';
        $xml .= '</data>';


        $client = new Client();
        $create = $client->request('POST', 'https://mtc.flg360.co.uk/api/APILeadCreateUpdate.php', [
            'headers' => [
                'Content-Type' => 'text/xml; charset=UTF8',
            ],
            'body' => $xml
        ]);

        echo $create->getBody();
    }

    public function getResponse()
    {
        // TODO: Implement getResponse() method.
    }

}