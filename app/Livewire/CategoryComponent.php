<?php

namespace App\Livewire;

use App\Models\Category;
use Livewire\Component;

class CategoryComponent extends Component
{
    public $categories, $name, $category_id, $searchname ,$editname,$activeForm = false, $editingCategory;


    public function mount(){
        $this->all();
    }

    public function all(){
        $this->categories = Category::all();
        return $this->categories;
    }
    
    public function render()
    {
        return view('livewire.category-component');
    }

    public function store()
    {
        if ($this->name ) {
            Category::create(['name' => $this->name]);
            $this->reset(['name']);
        }
        $this->activeForm = false;
        $this->all();
    }

    public function destroy($id)
    {
        $category = Category::findOrFail($id);

        if ($category) {
            $category->delete();
        }
        $this->all();
    }


    public function edit($id){
        $category = Category::findorFail($id);
        $this->editingCategory = $category->id;
        $this->editname = $category->name;
        $this->category_id = $category->id;
    }

    public function update()
    {
        $category = Category::findOrFail($this->category_id);;
        $category->update([
            'name' => $this->editname,
        ]);
        $this->editname = '';
        $this->editingCategory = 0;

        $this->all();
    }

    public function create(){
        $this->activeForm = true;
    }

    public function close(){
        $this->activeForm = false;
    }

    public function cencel(){
        $this->editingCategory = 0;
        $this->name = '';
    }

    public function searchColumn(){
        $this->categories = Category::where('name', 'LIKE', "{$this->searchname}%")
            ->get();
    }
}
