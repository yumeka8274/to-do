<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Posts;
use Illuminate\Support\Facades\Auth;
use Google\Client;
use Google\Service\Calendar;

class EventController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $user = Auth::user();

        $posts = Posts::all();
        $posts = Posts::where('user_id', $user->id)->get();

        // $events = [
        //     [
        //         'title' => 'イベント 1',
        //         'start' => '2023-06-11'
        //     ],
        //     [
        //         'title' => 'イベント 2',
        //         'start' => '2023-06-15'
        //     ]
        // ];

        $events = [];

        foreach($posts as $post)
        {
            $events[] = [
                'title' => $post->title,
                'start' => $post->created_at->format('Y-m-d'),
                'end' => $post->deadline,
                'description' => $post->body,
            ];
        }
        return response()->json($events);
    }

    public function addEventToGoogleCalendar($post)
    {
        $client = new Client();
        $client->setAuthConfig(storage_path('app/google-calendar/credentials.json'));
        $client->addScope(Calendar::CALENDAR);
        $client->setRedirectUri(route('google.callback'));

        // Exchange authorization code for an access token.
        $token = session('google_calendar_token');
        $client->setAccessToken($token);

        if ($client->isAccessTokenExpired()) {
            $refreshToken = $client->getRefreshToken();
            $client->fetchAccessTokenWithRefreshToken($refreshToken);
            session(['google_calendar_token' => $client->getAccessToken()]);
        }

        $service = new Calendar($client);
        $event = new Calendar\Event([
            'summary' => $post->title,
            'description' => $post->body,
            'start' => ['dateTime' => $post->created_at->toAtomString(), 'timeZone' => 'UTC'],
            'end' => ['dateTime' => $post->deadline->toAtomString(), 'timeZone' => 'UTC'],
        ]);

        $service->events->insert('primary', $event);
    }

}
