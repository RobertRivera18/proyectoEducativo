<?php

namespace App\Http\Livewire;

use App\Models\Post;
use App\Models\Level;
use Livewire\Component;
use App\Models\Category;
use Livewire\WithPagination;

class ResourceIndex extends Component
{
    use WithPagination;
    public $category_id;
    public $level_id;

    public function render()
    {
        $categories = Category::all();
        $levels=Level::all();
        $examples = Post::where('status', 3)
            ->where('tipo_recurso_id',1)
            ->category($this->category_id)
            ->level($this->level_id)
            ->latest('id')
            ->paginate(4);
        return view('livewire.resource-index', compact('examples', 'categories', 'levels'));
    }
    public function resetFilters()
    {
        $this-> reset(['category_id','level_id']);
    }
}
