<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use function Monolog\toArray;

class CustomerController extends Controller
{
    public function index()
    {
        $accessToken = $this->getAccessToken();
        $response = Http::withHeaders(['Authorization' => 'Zoho-oauthtoken ' . $accessToken])->get('https://www.zohoapis.eu/crm/v2/Contacts');
        $profile = null;
        if ($response->successful()) {
            $contacts = json_decode($response, true);
            $contacts = $contacts['data'];
            foreach ($contacts as $contact) {
                $profile[] = [
                    'Name' => $contact['Full_Name'],
                    'Email' => $contact['Email'],
                ];
            }
        }

        return view('api.auth.customers.index', compact('profile'));
    }

    public function create()
    {
        $accessToken = $this->getAccessToken();
        $response = Http::withHeaders(['Authorization' => 'Zoho-oauthtoken ' . $accessToken])->get('https://www.zohoapis.eu/crm/v2/Accounts');
        if ($response->successful()) {
            $accounts = json_decode($response, true);
            $accounts = $accounts['data'];
            foreach ($accounts as $account) {
                $profile[] = [
                    'Account' => $account['Account_Name'],
                    'Id' => $account['id'],
                ];
            }
        }
        return view('api.auth.customers.create', compact('profile'));
    }

    public function store(Request $request)
    {
        $accessToken = $this->getAccessToken();

        $jsonData = '{
                    "data": [
                        {
                            "Company": "ABC",
                            "Last_Name": "'.$request->lname.'",
                            "First_Name": "'.$request->name.'",
                            "Email": "'.$request->email.'",
                            "State": "Texas",
                            "Account_Name":{"name":"'.ltrim(strstr($request->account, ' ')).'","id":"'.strstr($request->account, ' ', true).'"},
                            "Phone":"'.$request->phone.'",
                        }
                    ],
                    "trigger": [
                        "approval",
                        "workflow",
                        "blueprint"
                    ]
                }';

        Http::withHeaders(['Authorization' => 'Zoho-oauthtoken ' . $accessToken])->withBody($jsonData)->post('https://www.zohoapis.eu/crm/v2/Contacts');

        return to_route('customers.index');
    }

    private function getAccessToken()
    {
        $clientId = '1000.FMJGRC0L02ZBWA4NDLHHQX2KI5OYBE';
        $clientSecret = '78d23a1f99627b60337e83a816b33acddee7251cb7';
        $refreshToken = '1000.96a159890920c580ffe53b098b34439e.821cbcb972311f029b492d31388040ce';

        $response = Http::post('https://accounts.zoho.eu/oauth/v2/token?refresh_token=' . $refreshToken . '&client_id=' . $clientId . '&client_secret=' . $clientSecret . '&grant_type=refresh_token');
        return json_decode($response)->access_token;
    }

}
