<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;
use Auth;

class PostController extends Controller
{
    public function show(){
        $posts = Post::latest()->paginate(5);
        return view('admin.blog.posts', compact('posts'));
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

        return redirect()->back();
    }

    public function edit($id)
    {
        $post = Post::findOrFail($id);
        return view('admin.blog.edit', compact('post'));
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

        return redirect()->back();
    }

    public function delete($id){
        $posts=Post::find($id);
        $posts->delete();
        return redirect(route('dashboard'));
    }
    public function sieve(Request $request){
        $posts =Post::query();
        if ($request->has('date')&& $request->date!=null){
            $posts->whereDate('created_at', $request->date);
        }
            $posts= $posts->paginate(5);
        return view('admin.blog.filter', compact('posts'));
    }
}
