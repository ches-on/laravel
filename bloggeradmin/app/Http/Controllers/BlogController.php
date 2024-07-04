<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
class BlogController extends Controller
{

    public function welcome(){
        $post = Post::paginate(5);

        return view('welcome', ['posts'=> $post]);
    }

    public function show($id)
    {
        $post = Post::with('comments')->findOrFail($id);
        return view('show', compact('post'));
    }
    public function search(Request $request){
        $search = $request->input('search');
        $posts = Post::where('title', 'LIKE', '%' . $search . '%')->paginate(5);
        return view('search', ['posts' => $posts]);
    }
    public function adsearch(Request $request){
        $search = $request->input('search');
        $posts = Post::where('title', 'LIKE', '%' . $search . '%')->paginate(5);
        return view('admin.search', ['posts' => $posts]);
    }
}
