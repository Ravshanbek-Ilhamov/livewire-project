<?php

use App\Livewire\AboutComponent;
use App\Livewire\CategoryComponent;
use App\Livewire\HomeComponent;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('main');
});


Route::get('/posts',HomeComponent::class);
Route::get('/category',CategoryComponent::class);