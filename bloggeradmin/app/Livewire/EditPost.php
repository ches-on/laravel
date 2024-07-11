<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Post;


class EditPost extends Component
{
    public $postId;
    public $author;
    public $title;

    protected $listeners = ['editPost' => 'loadPost'];

    public function loadPost($postId)
    {
        $post = Post::findOrFail($postId);
        $this->postId = $post->id;
        $this->author = $post->author;
        $this->title = $post->title;
    }

    public function save()
    {
        $post = Post::findOrFail($this->postId);
        $post->author = $this->author;
        $post->title = $this->title;
        $post->save();

        // Emit an event to notify that the post was updated
        $this->emit('postUpdated');
    }

    public function render()
    {
        return view('livewire.edit-post');
    }
}
