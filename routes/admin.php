<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\TagController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\AppController;
use App\Http\Controllers\Admin\PostsPendientesController;

Route::get('', [HomeController::class, 'index'])->middleware('can:admin.home')->name('admin.home');

Route::resource('users', UserController::class)->only(['index', 'edit', 'update'])->names('admin.users');
Route::resource('roles', RoleController::class)->names('admin.roles');
Route::resource('categories', CategoryController::class)->except('show')->names('admin.categories');
Route::resource('tags', TagController::class)->except('show')->names('admin.tags');
Route::resource('posts', PostController::class)->except('show')->names('admin.posts');
Route::resource('apps', AppController::class)->except('show')->names('admin.apps');
Route::resource('pendientes', PostsPendientesController::class)->names('admin.pendientes');
Route::get('posts/{post}', [PostController::class,'show'])->name('admin.posts.show');
Route::post('posts/{post}/approved', [PostController::class, 'approved'])->name('admin.posts.approved');
Route::get('posts/{post}/observation', [PostController::class, 'observation'])->name('admin.posts.observation');
Route::post('posts/{post}/reject', [PostController::class, 'reject'])->name('admin.posts.reject');
