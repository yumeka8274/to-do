<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Posts;


class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $user = Auth::user();
        return view('posts.post', compact('user'));
    }




    public function store(Request $request)
    {

        $request->validate([
            'title' => 'required|string|max:255',
            'body' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $imagePath = null;

        if($request->hasFile('image')){
            $filename = $request->file('image')->getClientOriginalName();
            $imagePath =$request->file('image')->storeAs('public/images', $filename);
        }
        Posts::create([
            'user_id' => Auth::id(),
            'title' => $request->title,
            'body' => $request->body,
            'image_at' => $imagePath,
        ]);
        

        return redirect()->route('posts.index')->with('success', 'レビューが作成されました');
    }

    function mypage($id)
    {
        $post = Posts::find($id);

        return view('post.mypage' ,['post'=>$post]);
    }
    
    function show($id)
    {
        // dd($id);
        $post = Posts::find($id);

        return view('posts.show' ,['post'=>$post]);
    }
    
}
