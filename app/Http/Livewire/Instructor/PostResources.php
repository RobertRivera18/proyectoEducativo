<?php

namespace App\Http\Livewire\Instructor;

use App\Models\Post;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;

class PostResources extends Component
{
    use WithFileUploads;
    public $post, $file;
    public function mount(Post $post)
    {
        $this->post = $post;
    }
   
    public function save()
    {
        $this->validate(['file' => 'required']);
        $url = $this->file->store('resources');
        $this->post->resource()->create([
            'url' => $url
        ]);
        $this->post = Post::find($this->post->id);
    }

    public function destroy(){
       Storage::delete($this->post->resource->url);
       $this->post->resource->delete();
       $this->post = Post::find($this->post->id);
    }
    public function download(){
        return response()->download(storage_path('app/' . $this->post->resource->url));
    }
    public function render()
    {
        return view('livewire.instructor.post-resources')->layout('layouts.instructor', ['post' => $this->post]);;
    }
    
}
