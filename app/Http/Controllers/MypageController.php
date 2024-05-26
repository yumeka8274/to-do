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



    function destroy($id)
    {
        $post = Posts::find($id);
        $post -> delete();
        return redirect()->route('posts.mypage');
    }
}



