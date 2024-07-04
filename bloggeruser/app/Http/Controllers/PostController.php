<?php

namespace App\Http\Controllers;
use App\Models\Post;
use Illuminate\Http\Request;
use Auth;

class PostController extends Controller
{
    public function show(){
        return view('create');
    }

    public function store(Request $request){
        $request->validate([
            'title'=>'required',
            'content'=>'required',
            'author'=>'required'
        ]);
        Post::create([
            'title' => $request->title,
            'content' => $request->input('content'),
            'author' => $request->author,
            'user_id' => Auth::id()??1, 
        ]);

        return redirect(route('welcome'));
    }

    public function edit($id)
    {
        $post = Post::findOrFail($id);
        return view('edit', compact('post'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'author' => 'required|string|max:255',
        ]);
    
        // Find the post by its ID
        $post = Post::findOrFail($id);
    
        // Update the post with the new data
        $post->update([
            'title' => $request->title,
            'content' => $request->input('content'),
            'author' => $request->author,
            'user_id' => Auth::id(),
        ]);
    
        return view('dashboard');
    }

    public function delete(Post $post){
        $post->delete();
        return view('dashboard');
    }
}
