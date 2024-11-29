<?php

use App\Livewire\CategoryComponent;
use App\Livewire\HomeComponent;
use App\Livewire\PostsCommentComponent;
use Illuminate\Support\Facades\Route;


Route::get('/posts',HomeComponent::class);
Route::get('/category',CategoryComponent::class);
Route::get('/',PostsCommentComponent::class); 