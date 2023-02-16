<?php

namespace App\Http\Livewire\Instructor;

use App\Models\Post;
use App\Models\Goal;
use Livewire\Component;

class PostsGoals extends Component
{
    public $post, $goal, $name;


    public function mount(Post $post)
    {
        $this->post = $post;
        $this->goal = new Goal();
    }
    protected $rules = [
        'goal.name' => 'required'
    ];


    public function render()
    {
        return view('livewire.instructor.posts-goals');
    }

    public function edit(Goal $goal)
    {
        $this->goal = $goal;
    }

    public function store()
    {
        $this->validate([
            'name'=>'required']);
        $this->post->goals()->create(['name'=>$this->name]);
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

    public function destroy(Goal $goal)
    {
        $goal->delete();
        $this->post = Post::find($this->post->id);
    }
}
