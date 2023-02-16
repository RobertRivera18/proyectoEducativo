<?php

namespace App\Http\Livewire;

use App\Models\Goal;
use App\Models\Post;
use Livewire\Component;

class GoalsResource extends Component
{
    public $post, $goal, $name;
    protected $rules = [
        'goal.name' => 'required'
    ];

    public function mount(Post $post)
    {
        $this->post = $post;
        $this->goal = new Goal();
    }
    public function render()
    {
        return view('livewire.goals-resource');
    }
    public function edit(Goal $goal)
    {
        $this->goal= $goal;
    }

    public function store()
    {
        $this->post->goals()->create([
            'name' => $this->name
        ]);
        $this->reset('name');
        $this->post = Post::find($this->post->id);
    }
    public function update()
    {
        $this->validate();
        $this->goal->save();
        $this->goal = new Goal();
        $this->post = Post::find($this->post->id);
    }
}
