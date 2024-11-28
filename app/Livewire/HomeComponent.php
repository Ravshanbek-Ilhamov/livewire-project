<?php

namespace App\Livewire;

use App\Models\Post;
use Livewire\Component;

class HomeComponent extends Component
{
    public $posts;
    public $description;
    public $text;
    public $title;
    public $post_id;
    public $isEditing = false;
    public $new_description;
    public $new_text;
    public $new_title;

    public function render()
    {
        $this->posts = Post::all();
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
    }

    public function destroy($id)
    {
        $post = Post::findOrFail($id);

        if ($post) {
            $post->delete();
        }
    }


    public function edit($id){

        $post = Post::findorFail($id);
        $this->isEditing = true;
        $this->post_id = $post->id;
        $this->title = $post->title;
        $this->description = $post->description;
        $this->text = $post->text;

    }


    public function update()
    {
        $post = Post::findOrFail($this->post_id);;

        $post->update([
            'title' => $this->title,
            'description' => $this->description,
            'text' => $this->text,
        ]);
        $this->title = '';
        $this->description = '';
        $this->text = '';
        // $this->reset(['new_title', 'new_description', 'new_text']);
    }

    public function cencel(){
        $this->isEditing = false;
    }
}
