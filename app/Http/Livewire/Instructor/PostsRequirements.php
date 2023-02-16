<?php

namespace App\Http\Livewire\Instructor;

use App\Models\Post;
use Livewire\Component;
use App\Models\Requirement;

class PostsRequirements extends Component
{
    
    public $post, $requirement, $name;
    protected $rules = [
        'requirement.name' => 'required'
    ];

    public function mount(Post $post)
    {
        $this->post = $post;
        $this->requirement = new Requirement();
    }

    public function edit(Requirement $requirement)
    {
        $this->requirement=$requirement;
    }

    public function store()
    {
        $this->validate([
            'name'=>'required']);
        $this->post->requirements()->create(['name'=>$this->name]);
        $this->reset('name');
        $this->post = Post::find($this->post->id);
    }

    public function update()
    {
        $this->validate();
        $this->requirement->save();
        $this->requirement = new Requirement();
        $this->post = Post::find($this->post->id);
    }

    public function destroy(Requirement $requirement)
    {
        $requirement->delete();
        $this->post = Post::find($this->post->id);
    }
    public function render()
    {
        return view('livewire.instructor.posts-requirements');
    }
}
