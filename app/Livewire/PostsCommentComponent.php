<?php

namespace App\Livewire;

use App\Models\Category;
use App\Models\Post;
use Livewire\Component;
use Carbon\Carbon;

class PostsCommentComponent extends Component
{
    
    public $posts,$detailingPost,$recentPosts,$categories, $post_details = false;

    public function render()
    {
        $this->posts = Post::all();
        $this->categories = Category::all();
        $this->recentPosts = Post::where('created_at', '>=', Carbon::now()->subWeek())->get();

        return view('posts.posts-comment-component')->layout('components.layouts.main');
    }

    public function post_details_page(Post $post){
        $this->post_details = true;
        $this->detailingPost = $post;
    }


}
