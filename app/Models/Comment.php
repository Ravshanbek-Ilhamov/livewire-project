<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = [
        'text',
        'post_id',
        'user_IP',
        'comment_to_id',
    ];

    // Each comment belongs to a post
    public function posts()
    {
        return $this->belongsTo(Post::class, 'post_id');
    }

    // A comment can have many child comments
    public function child_comment()
    {
        return $this->hasMany(Comment::class, 'comment_to_id');
    }

    // A comment can belong to a parent comment
    public function parent_comment()
    {
        return $this->belongsTo(Comment::class, 'comment_to_id');
    }
}

