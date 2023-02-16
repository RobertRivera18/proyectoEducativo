<?php

namespace App\Http\Livewire;

use App\Models\Post;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;

class DownloadResources extends Component
{
    public $post;
    public function mount(Post $post)
    {
        $this->post = $post;
    }
   
    public function download(){
        return response()->download(storage_path('app/' . $this->post->resource->url));
    }
    public function render()
    {
        return view('livewire.download-resources',['post' => $this->post]);
    }
    
}
