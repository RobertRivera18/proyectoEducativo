<?php

namespace App\Http\Livewire\Admin;

use App\Models\Post;
use Livewire\Component;
use Livewire\WithPagination;

class AppIndex extends Component
{
    use withPagination;
    protected $paginationTheme = "bootstrap";
    public $search;
    public function updatingSearch()
    {
        $this->resetPage();
    }
    public function render()
    {
        $apps = Post::where('user_id', auth()->user()->id)
        ->where('tipo_recurso_id', 2)
        ->where('name', 'LIKE', '%' . $this->search . '%')
        ->latest('id')
        ->paginate();
        return view('livewire.admin.app-index',compact('apps'));
    }
}
