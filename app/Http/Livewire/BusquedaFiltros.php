<?php

namespace App\Http\Livewire;

use App\Models\Post;
use App\Models\Level;
use App\Models\Subject;
use Livewire\Component;
use App\Models\Category;
use Livewire\WithPagination;

class BusquedaFiltros extends Component
{
    use WithPagination;
    public $category_id;
    public $search;
    public $level_id;
    public function render()
    {
        $categories = Category::all();
        $levels = Level::all();
        $subjects = Subject::all();
        $posts = Post::where('status', 3)
            ->where('tipo_recurso_id', 1)
            ->category($this->category_id)
            ->level($this->level_id)
            ->paginate(8);
        return view('livewire.busqueda-filtros', compact('categories', 'levels', 'subjects', 'posts'));
    }
    
    public function getResultsProperty(){
        return Post::where('name','LIKE','%'.$this->search.'%')
        ->where('tipo_recurso_id',1)
        ->where('status',3)->take(4)->get();
    }
}
