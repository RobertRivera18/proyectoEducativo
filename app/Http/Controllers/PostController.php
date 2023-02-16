<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use App\Models\Post;
use App\Models\Review;
use App\Models\Category;
use Illuminate\Http\Request;

class PostController extends Controller
{

    public function index()
    {
        $ultimosposts = Post::where('status', 3)
            ->where('tipo_recurso_id', 1)
            ->latest('id')->get()->take(4);

        $posts = Post::where('status', 2)->where('tipo_recurso_id', 1)->paginate(5);
        return view('posts.index', compact('posts', 'ultimosposts'));
    }
    

    public function show(Post $post)
    {
        $fechaCreated = $post->created_at;
        $nuevaFecha = date("d F Y", strtotime($fechaCreated));
        $similares = Post::where('category_id', $post->category_id)
            ->where('status', 3)
            ->where('tipo_recurso_id', 1)
            ->where('id', '!=', $post->id)
            ->latest('id')
            ->take(6)
            ->get();
        return view('posts.show', compact('post', 'similares'));
    }

    public function category(Category $category)
    {
        $posts = Post::where('category_id', $category->id)
            ->where('tipo_recurso_id', 1)
            ->where('status', 3)
            ->latest('id')
            ->paginate(4);
        return view('posts.category', compact('posts', 'category'));
    }

    public function tag(Tag $tag)
    {
        $posts = $tag->posts()->where('status', 3)
            ->where('tipo_recurso_id', 1)
            ->latest('id')
            ->paginate(4);
        return view('posts.tag', compact('posts', 'tag'));
    }
}
