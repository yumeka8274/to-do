<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Posts;
use App\Models\Folder;


class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {

        $user = Auth::user();
        
        $folders = Folder::all();
        return view('posts.post', compact('user', 'folders'));
    }




    public function store(Request $request)
    {

        $request->validate([
            'title' => 'required|string|max:255',
            'body' => 'required|string',
            'flag' => 'required|boolean',  


        ]);
        Posts::create([
            'user_id' => Auth::id(),
            'folder_id' => $request->folder_id,
            'title' => $request->title,
            'body' => $request->body,
            'deadline' => $request->deadline,
            'flag' => (bool) $request->flag,
        ]);
        


     
        

        return redirect()->route('posts.mypage')->with('success', 'レビューが作成されました');
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

    public function updateFlag(Request $request, $id)
    {
        $post = Posts::find($id);
        if ($post){
            $post->flag = $request->input('flag', false);
            $post->save();
            return response()->json(['message' => 'Flag updated successfully.']);
        }else {
            return response()->json(['error' => 'Failed to update flag.'], 500);
        }
    }
    


}
