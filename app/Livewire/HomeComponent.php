<?php

namespace App\Livewire;

use App\Models\Category;
use App\Models\Post;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

class HomeComponent extends Component
{
    use WithPagination;
    use WithFileUploads;

    public $posts, $editingPost;
    public $description;
    public $text;
    public $title;
    public $post_id;

    public $category_id;
    public $categories;
    public $searchcategory;
    public $editcategory;
    public $editcategory_id;
    
    public $isEditing = false;
    public $activeForm = false;

    public $searchdescription;
    public $searchtext;
    public $searchtitle;

    public $editdescription;
    public $edittext;
    public $edittitle;
    public $file;

    protected $rules = [
        'title' => 'required|string|min:12|max:255',
        'description' => 'required|string|max:500', 
        'text' => 'required|string', 
        'file' => 'nullable|file|mimes:jpg,jpeg,png|max:2048', 
        'category_id' => 'required|integer|exists:categories,id',
    ];

    public function mount(){
        $this->all();
    }

    public function all(){
        $this->posts = Post::all();
        return $this->posts;
    }
    
    public function render()
    {
        $this->categories = Category::all();
        return view('livewire.home-component');
    }

    public function updated($propertyName){

        $this->validateOnly($propertyName);

    }

    
    public function store()
    {
        $this->validate();

        $filePath = null;

        if ($this->file) {
            $filePath = $this->file->store('posts', 'public'); 
        }
        // dd($filePath);
        Post::create([
            'title' => $this->title,
            'description' => $this->description,
            'text' => $this->text,
            'category_id' => $this->category_id,
            'image_path' => $filePath, 
        ]);

        $this->reset(['title', 'description', 'text', 'category_id', 'file']);
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
        $this->editcategory_id = $post->category_id;
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
            'category_id' => $this->editcategory,
        ]);
        $this->edittitle = '';
        $this->editdescription = '';
        $this->edittext = '';
        $this->editcategory;
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
            ->where('category_id', 'LIKE', "{$this->searchcategory}%")
            ->get();
    }

        public function switch($id){
            $post = Post::findorFail($id);
            $post->is_active = !$post->is_active;
            $post->save();
            $this->all();
        }
}
