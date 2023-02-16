<?php

namespace App\Http\Controllers\Admin;

use App\Models\Tag;
use App\Models\Post;
use App\Models\Level;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Requests\PostRequest;
use App\Http\Controllers\Controller;
use App\Mail\ApprovedPost;
use App\Mail\RejectPost;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{

    public function __construct()
    {
        $this->middleware('can:admin.posts.index')->only('index');
        $this->middleware('can:admin.posts.create')->only('create', 'store');
        $this->middleware('can:admin.posts.edit')->only('edit', 'update');
        $this->middleware('can:admin.posts.destroy')->only('destroy');
    }

    public function index()
    {
        $posts=Post::where('status',3)
        ->where('tipo_recurso_id', 1)
        ->latest('id');
        return view('admin.posts.index', compact('posts'));
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
        return view('admin.posts.create', compact('categories', 'tags', 'levels'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostRequest $request)
    {
        $post = Post::create($request->all());
        if ($request->file('file')) {
            $url = Storage::put('public/posts', $request->file('file'));
            $post->image()->create([
                'url' => $url
            ]);
        }
        if ($request->tags) {
            $post->tags()->attach($request->tags);
        }
        return redirect()->route('admin.posts.edit', $post);
    }


    public function edit(Post $post)
    {

        $categories = Category::pluck('name', 'id');
        $levels = Level::pluck('name', 'id');
        $tags = Tag::all();

        return view('admin.posts.edit', compact('post', 'categories', 'tags', 'levels'));
    }


    public function update(PostRequest $request, Post $post)
    {

        $post->update($request->all());
        if ($request->file('file')) {
            $url = Storage::put('public/posts', $request->file('file'));
            if ($post->image) {
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
        return redirect()->route('admin.posts.edit', $post)->with('info', 'El post se actualizó con éxito');
    }

    public function destroy(Post $post)
    {
        // $this->authorize('author',$post);
        $post->delete();
        return redirect()->route('admin.posts.index')->with('eliminar', 'ok');
    }

    


    public function show(Post $post)
    {
        $this->authorize('revision', $post);
        return view('admin.pendientes.show', compact('post'));
    }

    public function approved(Post $post)
    {
        $this->authorize('revision', $post);
        if (!$post->goals || !$post->image) {
            return back()->with('info', 'No se puede publicar un post que no este completo');
        }
        $post->status = 3;
        $post->save();
        //ENVIO DEL CORREO ELECTRONICO
        $email = new ApprovedPost($post);
        Mail::to($post->user->email)->queue($email);
        return redirect()->route('admin.pendientes.index')->with('info', 'Este post se aprobo con exito');
        
    }
    
    public function observation(Post $post)
    {
        return view('admin.pendientes.observation', compact('post'));
    }

    public function reject(Request $request, Post $post)
    {
        $request->validate([
            'body'=>'required'
        ]);
        $post->observation()->create($request->all());
        $post->status = 1;
        $post->save();
         //ENVIO DEL CORREO ELECTRONICO
         $email = new RejectPost($post);
         Mail::to($post->user->email)->queue($email);
         return redirect()->route('admin.pendientes.index')->with('error', 'Este posts fue reprobado');
    }
}
