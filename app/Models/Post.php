<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    
    protected $fillable = [
        'title',
        'description',
        'views',
        'text',
        'category_id',
        'is_active',
        'image_path',
    ];

    public function categories(){
        return $this->belongsTo(Category::class,'category_id');
    }

    public function comments(){
        return $this->hasMany(Comment::class);
    }

    public function likeDislikes(){
        return $this->hasMany(LikeDislike::class);
    }
}
