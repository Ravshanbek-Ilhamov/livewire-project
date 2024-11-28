<?php

use App\Livewire\AboutComponent;
use App\Livewire\HomeComponent;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('main');
});


Route::get('/posts',HomeComponent::class);
// Route::get('/calculate',AboutComponent::class);