<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use function Monolog\toArray;

class DealController extends Controller
{
    public function index()
    {
        $accessToken = $this->getAccessToken();
        $response = Http::withHeaders(['Authorization' => 'Zoho-oauthtoken ' . $accessToken])->get('https://www.zohoapis.eu/crm/v2/Deals');
        $profile = null;
        if ($response->successful()) {
            $deals = json_decode($response, true);
            $deals = $deals['data'];
            foreach ($deals as $deal) {
                $profile[] = [
                    'Deal' => $deal['Deal_Name'],
                    'Contact' => $deal['Contact_Name']['name'],
                ];
            }
        }

        return view('api.auth.deals.index', compact('profile'));
    }

    public function create()
    {
        $accessToken = $this->getAccessToken();
        $response = Http::withHeaders(['Authorization' => 'Zoho-oauthtoken ' . $accessToken])->get('https://www.zohoapis.eu/crm/v2/Contacts');
        if ($response->successful()) {
            $contacts = json_decode($response, true);
            $contacts = $contacts['data'];
            foreach ($contacts as $contact) {
                $contactNames[] = [
                    'Name' => $contact['Full_Name'],
                    'Id' => $contact['id'],
                ];
            }
        }

        $response = Http::withHeaders(['Authorization' => 'Zoho-oauthtoken ' . $accessToken])->get('https://www.zohoapis.eu/crm/v2/Accounts');
        if ($response->successful()) {
            $accounts = json_decode($response, true);
            $accounts = $accounts['data'];
            foreach ($accounts as $account) {
                $accountNames[] = [
                    'Account' => $account['Account_Name'],
                    'Id' => $account['id'],
                ];
            }
        }

        return view('api.auth.deals.create', compact('contactNames', 'accountNames'));
    }

    public function store(Request $request)
    {
        $accessToken = $this->getAccessToken();

        $jsonData = '{
                    "data": [
                        {
                            "Deal_Name":"'.$request->name.'",
                            "Stage":"Need Analysis",
                            "Amount":'.$request->amount.',
                            "Closing_Date":'.$request->closing.',
                            "Account_Name":{"name":"'.ltrim(strstr($request->account, ' ')).'","id":"'.strstr($request->account, ' ', true).'"},
                            "Contact_Name":{"name":"'.ltrim(strstr($request->contact, ' ')).'","id":"'.strstr($request->contact, ' ', true).'"}
                        }
                    ],
                    "trigger": [
                        "approval",
                        "workflow",
                        "blueprint"
                    ]
                }';

        Http::withHeaders(['Authorization' => 'Zoho-oauthtoken ' . $accessToken])->withBody($jsonData)->post('https://www.zohoapis.eu/crm/v2/Deals');

        return to_route('deals.index');
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
