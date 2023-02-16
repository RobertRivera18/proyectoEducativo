<?php

namespace App\Http\Controllers;

use App\Models\App;
use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;

class AppController extends Controller
{
    public function index()
    {
        $posts=Post::all()->where('tipo_recurso_id',2);
        $categories=Category::all();
        return view('apps.index',compact('posts','categories'));
    }
    public function show(Post $app){
           
            $similares = Post::where('category_id', $app->category_id)
                ->where('id', '!=', $app->id)
                ->where('status', 2)
                ->where('tipo_recurso_id',2)
                ->latest('id')
                ->take(5)
                ->get();
            return view('apps.show', compact('app', 'similares'));
        }
    



    
}
