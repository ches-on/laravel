<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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

    public function delete($id)
    {
        $post = Post::find($id);

        if ($post) {
            $post->delete();
            return redirect()->route('dashboard')->with('success', 'Post deleted successfully.');
        } else {
            return redirect()->route('dashboard')->with('error', 'Post not found.');
        }
    }

    public function filter(Request $request){
        $posts =Post::query();
        if ($request->has('startdate')&& $request->startdate!=null){
            $posts->whereDate('created_at', $request->startdate);
        }
            $posts= $posts->paginate(5);
        return view('admin.blog.filter', compact('posts'));
    }

    // public function more(Request $request, $id)
    // {
    // //  $posts = Post::findOrFail($id);
    //     $posts = Post::with('comments')->findOrFail($id);
    //     return view('admin.blog.show', compact('posts'));
    // }

    public function more($id)
    {
        $comments= Comment::all();
        $post = Post::with('comments')->findOrFail($id);
        $relatedPosts = Post::relatedPosts($post)->take(5)->get();
        return view('admin.blog.show', compact('post','relatedPosts'));
    }

}
