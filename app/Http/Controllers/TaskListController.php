<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Posts;
use App\Models\Folder;

class TaskListController extends Controller
{
    public function index()
   {
    $posts = Posts::where('flag', '=', 0)->get();

    foreach ($posts as $post) {
        $folder_id = $post['folder_id'];
        $folder = Folder::find($folder_id);
        $post->folder_name = $folder->title;

    }

    return view('task.index',['posts' => $posts]);
   }
}
