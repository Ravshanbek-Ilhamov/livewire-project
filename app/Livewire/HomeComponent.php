<?php

namespace App\Livewire;

use App\Models\Post;
use Livewire\Component;

class HomeComponent extends Component
{
    public $posts, $editingPost;
    public $description;
    public $text;
    public $title;
    public $post_id;
    
    public $isEditing = false;
    public $activeForm = false;

    public $searchdescription;
    public $searchtext;
    public $searchtitle;

    public $editdescription;
    public $edittext;
    public $edittitle;

    public function mount(){
        $this->all();
    }

    public function all(){
        $this->posts = Post::all();

        return $this->posts;
    }
    
    public function render()
    {
        return view('livewire.home-component');
    }

    public function store()
    {
        if ($this->title && $this->description && $this->text && $this->isEditing == false) {
            Post::create([
                'title' => $this->title,
                'description' => $this->description,
                'text' => $this->text,
            ]);

            $this->reset(['title', 'description', 'text']);
        }
        $this->activeForm = false;
        $this->all();

    }

    public function destroy($id)
    {
        $post = Post::findOrFail($id);

        if ($post) {
            $post->delete();
        }
        $this->all();

    }

    public function edit($id){
    // dd(12);
        $post = Post::findorFail($id);
        $this->editingPost = $post->id;
        $this->post_id = $post->id;
        $this->edittitle = $post->title;
        $this->editdescription = $post->description;
        $this->edittext = $post->text;

    }


    public function update()
    {
        $post = Post::findOrFail($this->post_id);;

        $post->update([
            'title' => $this->edittitle,
            'description' => $this->editdescription,
            'text' => $this->edittext,
        ]);
        $this->edittitle = '';
        $this->editdescription = '';
        $this->edittext = '';
        $this->editingPost = 0;
        $this->all();

    }

    public function create(){
        $this->activeForm = true;
    }

    public function close(){
        $this->activeForm = false;
    }

    public function cencel(){
        $this->editingPost = 0;
        $this->title = '';
        $this->description = '';
        $this->text = '';
        $this->all();
    }

    public function searchColumn(){
        
        $this->posts = Post::where('title', 'LIKE', "{$this->searchtitle}%")
            ->where('description', 'LIKE', "{$this->searchdescription}%")
            ->where('text', 'LIKE', "{$this->searchtext}%")
            ->get();
    }

        public function switch($id){
            $post = Post::findorFail($id);
            $post->is_active = !$post->is_active;
            $post->save();
            $this->all();
        }
}
