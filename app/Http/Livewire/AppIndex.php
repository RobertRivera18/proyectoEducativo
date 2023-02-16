<?php

namespace App\Http\Livewire;

use App\Models\Post;
use App\Models\Level;
use Livewire\Component;
use App\Models\Category;
use Livewire\WithPagination;

class AppIndex extends Component
{
    use WithPagination;
    public $category_id;
    public $level_id;
    public function render()
    {
        $categories = Category::all();
        $apps = Post::where('status', 2)
        ->where('tipo_recurso_id',2)
            ->category($this->category_id)
            ->latest('id')
            ->paginate(8);
        return view('livewire.app-index',compact('apps', 'categories'));
    }
    public function resetFilters()
    {
        $this-> reset(['category_id']);
    }
}
