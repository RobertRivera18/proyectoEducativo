<?php

namespace App\Http\Livewire;

use App\Models\Post;
use Livewire\Component;

class ReviewsPost extends Component
{
    protected $listeners=['render'=>'render'];
    public function mount(Post $post)
    {
        $this->post_id = $post->id;
        
    }
    public function render()
    {
        $post = Post::find($this->post_id);
        $ratingsCount = [
            1 => $post->reviews()->where('rating', 1)->count(),
            2 => $post->reviews()->where('rating', 2)->count(),
            3 => $post->reviews()->where('rating', 3)->count(),
            4 => $post->reviews()->where('rating', 4)->count(),
            5 => $post->reviews()->where('rating', 5)->count(),
        ];
        return view('livewire.reviews-post',compact('post','ratingsCount'));
    }
}
