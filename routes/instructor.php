<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Instructor\PostController;
use App\Http\Livewire\Instructor\PostResources;

Route::redirect('', 'instructor/posts');
Route::resource('posts', PostController::class)->names('posts');
Route::get('posts/{post}/resources',PostResources::class)->name('posts.resources');
Route::get('posts/{post}/goals',[PostController::class,'goals'])->name('posts.goals');
Route::post('posts/{post}/status',[PostController::class,'status'])->name('posts.status');
Route::get('posts/{post}/observation',[PostController::class,'observation'])->name('posts.observation');


