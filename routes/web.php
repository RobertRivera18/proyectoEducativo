<?php

use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AppController;
use App\Http\Controllers\IndexController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [IndexController::class,'index'])->name('home.index');
Route::get('posts', [PostController::class,'index'])->name('posts.index');
Route::get('posts/{post}',[PostController::class,'show'])->name('posts.show');
Route::get('category/{category}',[PostController::class,'category'])->name('posts.category');
Route::get('tag/{tag}',[ PostController::class,'tag'])->name('posts.tag');
Route::get('apps', [AppController::class,'index'])->name('apps.index');
Route::get('apps/{app}', [AppController::class,'show'])->name('apps.show');




Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
