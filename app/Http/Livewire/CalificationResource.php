<?php

namespace App\Http\Livewire;

use App\Models\Post;
use Livewire\Component;

class CalificationResource extends Component
{
    public $post_id, $comment;
    public $rating = 0;
    public $open = false;
    protected $rules=[
        'rating'=>'required',
        'comment'=>'required'
    ];

    public function mount(Post $post)
    {
        $this->post_id = $post->id;
    }
    public function render()
    {
        $post = Post::find($this->post_id);
        return view('livewire.calification-resource', compact('post'));
    }

    public function store()
    {
        $this->validate();
        $post = Post::find($this->post_id);
        $post->reviews()->create([
            'comment' => $this->comment,
            'rating' => $this->rating,
            'user_id' => auth()->user()->id
        ]);
        $this->reset(['open','comment','rating']);
        $this->emit('render');
        }
}
