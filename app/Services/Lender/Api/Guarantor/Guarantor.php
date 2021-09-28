<?php

namespace App\Services\Lender\Api\Guarantor;

use App\Services\Lender\Api\LenderApi;
use App\Services\Lender\Api\LenderResponse;
use App\Services\Lender\Request\LenderRequest;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Log;

class Guarantor extends LenderApi
{
    public $response;

    public function __construct(LenderRequest $lenderRequest)
    {
        parent::__construct($lenderRequest);
    }

    public function submitApplication():LenderResponse
    {
        $xmlRequestBody = $this->formatRequest();
        return $this->sendRequest($xmlRequestBody);
    }

    public function formatRequest()
    {
        $dob = explode('-', $this->request->customer->dob);
        $year = $dob[0];
        $month = $dob[1];
        $day = $dob[2];

        $xml = '<?xml version="1.0" encoding="ISO-8859-1"?>';
        $xml .= '<data><lead>';
        $xml .= '<key>' . $this->request->credential->credential['key'] . '</key>';
        $xml .= '<title>' . $this->request->customer->title . '</title>';
        $xml .= '<firstname>' . $this->request->customer->firstName . '</firstname>';
        $xml .= '<lastname>' . $this->request->customer->lastName . '</lastname>';
        $xml .= '<address>' . $this->getAddress() . '</address>';
        $xml .= '<towncity>' . $this->request->address->city . '</towncity>';
        $xml .= '<postcode>' . $this->request->address->postCode . '</postcode>';
        $xml .= '<dobday>' . $day . '</dobday>';
        $xml .= '<dobmonth>' . $month . '</dobmonth>';
        $xml .= '<dobyear>' . $year . '</dobyear>';
        $xml .= '<data1>' . $this->request->application->loanAmount . '</data1>';
        $xml .= '<data2>' . $this->request->application->loanTerm . '</data2>';
        $xml .= '<data3>' . $this->request->application->purpose . '</data3>';
        $xml .= '<data9>' . $this->request->bank->sortCode . '</data9>';
        $xml .= '<data10>' . $this->request->bank->accountNumber . '</data10>';
        $xml .= '<data11>' . $this->request->customer->employmentStatus . '</data11>';
        $xml .= '</lead></data>';

        return $xml;
    }

    private function getAddress()
    {
        $address = [];

        if (!empty($this->request->address->houseName)) {
            $address[] = 'House name: ' . $this->request->address->houseName;
        }

        if (!empty($this->request->address->houseNumber)) {
            $address[] = 'House number: ' . $this->request->address->houseNumber;
        }

        if (!empty($this->request->address->flat)) {
            $address[] = 'Flat: ' . $this->request->address->flat;
        }

        if (!empty($this->request->address->roadName)) {
            $address[] = 'Road name: ' . $this->request->address->roadName;
        }

        if (!empty($this->request->address->roadNumber)) {
            $address[] = 'Road number: ' . $this->request->address->roadNumber;
        }

        $address = implode(', ', $address);

        return $address;
    }

    private function sendRequest($xmlRequestBody): LenderResponse
    {
        $client = new Client();
        $create = $client->request('POST', $this->request->credential->credential['uri'], [
            'headers' => $this->request->credential->credential['headers'],
            'body' => $xmlRequestBody
        ]);

        return $this->parseResponse($create->getBody());
    }

    private function parseResponse($xmlResponse): LenderResponse
    {
        $response = simplexml_load_string($xmlResponse);

        if (($response->status == 0) && ($response->item->message == 'OK')) {

            $status = $response->status == 0 ? 'Approved' : 'Declined';

            $lenderResponse = new LenderResponse($status);

            return $lenderResponse;
        }

        $errorMessage = $response->item->message;
        Log::error($errorMessage);

        return new LenderResponse('Failed');
    }
}
