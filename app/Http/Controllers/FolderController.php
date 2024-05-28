<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Posts;
use App\Models\Folder;
use Illuminate\Support\Facades\Auth;

class FolderController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {

        $user = Auth::user();
        return view('folder.post', compact('user'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $imagePath = null;

        if($request->hasFile('image')){
            $filename = $request->file('image')->getClientOriginalName();
            $imagePath =$request->file('image')->storeAs('public/images', $filename);
        }

        Folder::create([
            'user_id' => Auth::id(),
            'title' => $request->title,
            'image_at' => $imagePath,
        ]);

        return redirect()->route('posts.mypage')->with('success', 'レビューが作成されました');
    }

    public function show($id)
    {
        $post = Posts::find($id);
        dd($post);
        return view('folder.show', ['post' => $post]);
    }
}