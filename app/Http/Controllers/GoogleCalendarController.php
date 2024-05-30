<?php

namespace App\Http\Controllers;
use Google\Client;
use Google\Service\Calendar;

use Illuminate\Http\Request;

class GoogleCalendarController extends Controller
{
    public function redirectToGoogle()
    {
        $client = new Client();
        $client->setAuthConfig(storage_path('app/google-calendar/credentials.json'));
        $client->addScope(Calendar::CALENDAR);
        $client->setRedirectUri(route('google.callback'));

        $authUrl = $client->createAuthUrl();
        return redirect($authUrl);
    }

    public function handleGoogleCallback(Request $request)
    {
        $client = new Client();
        $client->setAuthConfig(storage_path('app/google-calendar/credentials.json'));
        $client->addScope(Calendar::CALENDAR);
        $client->setRedirectUri(route('google.callback'));

        $client->authenticate($request->code);
        $token = $client->getAccessToken();
        $request->session()->put('google_calendar_token', $token);

        return redirect('/events');
    }
}
