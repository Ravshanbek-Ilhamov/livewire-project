<?php

namespace App\Livewire;

use App\Models\Category;
use App\Models\Comment;
use App\Models\LikeDislike;
use App\Models\Post;
use Livewire\Component;
use Carbon\Carbon;
use Illuminate\Http\Request as HttpRequest;

class PostsCommentComponent extends Component
{
    
    public $posts,$detailingPost,$recentPosts,$comments,
           $storingcomment,$categories,
           $comment_form = null,
           $storingchildcomment,
           $likesDislike,
           $userslikesDislike,
           $filteringCategory,
           $comment_parent_id = null,
           $post_details = false;

    public function render()
    {
        $this->posts = Post::all();
        $this->categories = Category::all();
        $this->comments = Comment::where('comment_to_id',null)->get();
        $this->likesDislike = LikeDislike::all();
        $this->recentPosts = Post::where('created_at', '>=', Carbon::now()->subWeek())->get();

        if ($this->filteringCategory) {
            $this->posts = Post::where('category_id',$this->filteringCategory)->get();
        }

        return view('posts.posts-comment-component')->layout('components.layouts.main');
    }

    public function post_details_page(Post $post){
        $post->increment('views');
        $this->post_details = true;
        $this->detailingPost = $post;
        $this->userslikesDislike = LikeDislike::where('post_id', $this->detailingPost->id)
                                                ->where('user_IP', request()->ip())
                                                ->get();
    }


    public function storeComment(HttpRequest $request)
    {
        $data = [
            'text' => $this->storingcomment,
            'post_id' => $this->detailingPost->id,
            'user_IP' => $request->ip(),
        ];
   
        Comment::create($data);
        $this->comment_form = null;
        $this->storingcomment = ''; 
    }
    
    public function storechildComment(HttpRequest $request)
    {
        $data = [
            'text' => $this->storingchildcomment,
            'post_id' => $this->detailingPost->id,
            'user_IP' => $request->ip(),
        ];
    
        if ($this->comment_parent_id) {
            $data['comment_to_id'] = $this->comment_parent_id;
        }

        // dd($data);
        Comment::create($data);
        $this->comment_form = null;
        $this->storingcomment = ''; 
        $this->storingchildcomment = '';
    }

    public function storeParentComment($id){
        $this->comment_parent_id = $id;
        $this->comment_form = $id;
    }

    public function likeDislike(HttpRequest $request ,$status){
        $likeDislike = LikeDislike::where('user_IP',$request->ip())->where('post_id', $this->detailingPost->id)->first();

        if (!$likeDislike) {

            LikeDislike::create([
                'user_IP' => $request->ip(),
                'value' => $status,
                'post_id' => $this->detailingPost->id
            ]);

        }elseif(($likeDislike['value'] == 0 && $status == 0) ||  ($likeDislike['value'] == 1 && $status == 1)){
            $likeDislike->update([
                'value' => null
            ]);
        }elseif ($likeDislike['value'] == 0 && $status == 1) {
            $likeDislike->update([
                'value' => true
            ]);
        }elseif ($likeDislike['value'] == 1 && $status == 0) {
            $likeDislike->update([
                'value' => false
            ]);
        }
    }

    public function filterByCategory($category){
        $this->filteringCategory = $category;
    }
}
