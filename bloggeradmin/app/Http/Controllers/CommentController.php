<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function store(Request $request, $postId)
    {
        $request->validate([
            'comment' => 'required|string|max:255',
        ]);

        $post = Post::findOrFail($postId);

        $userId = Auth::id();
        if (!$userId) {
            return redirect()->back()->with('error', 'User not authenticated');
        }

        $post = Post::findOrFail($postId);

        $comment = new Comment();
        $comment->post_id = $postId;
        $comment->user_id = Auth::id(); // Ensure user is authenticated
        $comment->comment = $request->input('comment');
        $comment->save();

        return redirect()->back()->with('success', 'Comment added successfully!');
    }
}