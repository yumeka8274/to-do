<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Posts;
use Illuminate\Support\Facades\Auth;


class MypageController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {

        $user = Auth::user();
        $posts = Posts::all();
        // $mypage = MypageController::user();
        // if($user-> == $mypage){
        //     return view('posts.mypage',['posts'=>$mypage]);
        // }    
        $posts = Posts::where('user_id', $user->id)->get();
        
        return view('posts.mypage',['posts'=>$posts]);
    }
    public function show($id)
    {
        $post = Posts::find($id);
        // dd($post);

        return view('posts.show' ,['post'=>$post]);
    }


    function destroy($id)
    {
        $post = Posts::find($id);
        $post -> delete();
        return redirect()->route('posts.mypage');
    }

 
    //画像の編集機能
    public function edit($id)
    {
        $user = Auth::user();
        $post = Posts::find($id);

        return view('posts.edit', compact('post','user'));
    }

    //画像の更新
    public function update(Request $request, $id)
    {
        
        $post = Posts::find($id);
        $post->title = $request->input('title');
        $post->body = $request->input('body');
        $post->save();
        return redirect()->route('posts.mypage');
    }
}



