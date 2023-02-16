<?php

namespace App\Http\Livewire\Admin;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class UserIndex extends Component
{
    use WithPagination;
    
    public $busqueda;
    protected $paginationTheme = "bootstrap";


    public function  updatingSearch(){
            $this->resetPage();
    }

    public function render()
    {
        $users = User::where('name','LIKE','%' .$this->busqueda .'%')
        ->orWhere('email','LIKE','%' .$this->busqueda .'%')
        ->paginate();
        return view('livewire.admin.user-index', compact('users'));
    }

  
}
