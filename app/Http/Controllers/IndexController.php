<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index()
    {
        $ultimosposts = Post::where('status', 3)
            ->where('tipo_recurso_id', 1)
            ->latest('id')->get()->take(12);

        $posts = Post::where('status', 3)->where('tipo_recurso_id', 1)->paginate(5);
        return view('welcome', compact('posts', 'ultimosposts'));
    }
}
