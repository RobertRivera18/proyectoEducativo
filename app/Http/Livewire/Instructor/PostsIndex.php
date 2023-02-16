<?php

namespace App\Http\Livewire\Instructor;

use App\Models\Post;
use Livewire\Component;
use Livewire\WithPagination;

class PostsIndex extends Component
{
    public $search;
    use WithPagination;
    public function render()
    {
        $posts= Post::where('name', 'LIKE', '%' . $this->search . '%')
            ->where('user_id',auth()->user()->id)
            ->where('tipo_recurso_id',1)
            ->latest('id')
            ->paginate(10);
        return view('livewire.instructor.posts-index',compact('posts'));
    }

    public function limpiar_page(){
        $this->reset('page');
       }
}
