<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Posts;
use Illuminate\Support\Facades\Auth;

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
            ];
        
        }
        return response()->json($events);
    }
}
