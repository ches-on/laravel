<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected $fillable=[
        'title',
        'content',
        'author',
        'user_id',
    ];
    public function scopeRelatedPosts($query, $post)
    {
        // Split the title into words
        $words = explode(' ', $post->title);

        // Search for posts containing any of these words in their title
        return $query->where(function ($q) use ($words) {
            foreach ($words as $word) {
                $q->orWhere('title', 'LIKE', '%' . $word . '%');
            }
        })->where('id', '!=', $post->id);
    }

    // this post belongs to a user
    public function user(){
        return $this->belongsTo(User::class);
     }

    //  a post has many comments
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
}
