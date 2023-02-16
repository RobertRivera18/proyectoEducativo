<?php

namespace App\Http\Controllers\Instructor;

use App\Models\Level;
use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Tag;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{

    public function index()
    {
        return view('instructor.posts.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::pluck('name', 'id');
        $levels = Level::pluck('name', 'id');
        $tags = Tag::all();
        return view('instructor.posts.create', compact('categories', 'levels','tags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'slug' => 'required|unique:posts',
            'extract' => 'required',
            'body' => 'required',
            'tags' => 'required',
            'file' => 'image',
        ]);
        $post = Post::create($request->all());
        if ($request->file('file')) {
            $url = Storage::put('public/instructor', $request->file('file'));
            $post->image()->create([
                'url' => $url
            ]);
            if ($request->tags) {
                $post->tags()->attach($request->tags);
            }
        }
        
        return redirect()->route('instructor.posts.index', $post);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return view('instructor.posts.show', compact('posts'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        $categories = Category::pluck('name', 'id');
        $levels = Level::pluck('name', 'id');
        $tags = Tag::all();
        return view('instructor.posts.edit', compact('post','categories','levels','tags'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $post->update($request->all());
        if ($request->file('file')) {
            $url = Storage::put('public/instructor', $request->file('file'));
            if ($post->image()) {
                Storage::delete($post->image->url);
                $post->image->update([
                    'url' => $url
                ]);
            } else {
                $post->image()->create([
                    'url' => $url
                ]);
            }
        }
        if ($request->tags) {
            $post->tags()->sync($request->tags);
        }
        return redirect()->route('instructor.posts.index', $post);
    }

    // /**
    //  * Remove the specified resource from storage.
    //  *
    //  * @param  int  $id
    //  * @return \Illuminate\Http\Response
    //  */
    public function destroy(Post $post)
    {
        $post->delete();
        return redirect()->route('instructor.posts.index')->with('eliminar', 'ok');
    }

    public function goals(Post $post)
    {
        return view('instructor.posts.goals', compact('post'));
    }

    
    public function status(Post $post)
    {
        $post->status = 2;
        $post->save();
         $post->observation->delete();
        return redirect()->route('instructor.posts.edit',$post);
    }

    public function observation(Post $post){
     return view('instructor.posts.observation',compact('post'));
    }
}
