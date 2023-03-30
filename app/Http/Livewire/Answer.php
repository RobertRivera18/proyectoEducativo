<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Answer as ModelsAnswer;



class Answer extends Component


{
    public $question;
    public $open = false;
    public $cant = 0;
    public $answer_created = [
        'open' => false,
        'body' => ''
    ];
    public $answer_edit = [
        'id' => null,
        'body' => ''
    ];

    public $answer_to_answer = [
        'id' => null,
        'body' => ''
    ];


    public function getAnswersProperty()
    {
        return $this->question->answers()
            ->get()
            ->take($this->cant * (-1));
    }

    public function store()
    {
        $this->validate([
            'answer_created.body' => 'required'
        ]);
        $this->question->answers()->create([
            'body' => $this->answer_created['body'],
            'user_id' => auth()->id()
        ]);
        $this->cant += 1;
        $this->reset('answer_created');
    }


    public function edit($answerId)
    {
        $answer = ModelsAnswer::find($answerId);
        $this->answer_edit = [
            'id' => $answer->id,
            'body' => $answer->body
        ];
    }

    public function update()
    {
        $this->validate([
            'answer_edit.body' => 'required'
        ]);
        $answer = ModelsAnswer::find($this->answer_edit['id']);
        $answer->update([
            'body' => $this->answer_edit['body']
        ]);

        $this->reset('answer_edit');
    }

    public function destroy($questionId)
    {
        $answer = ModelsAnswer::find($questionId);
        $answer->delete();
    }

    public function answer_to_answer_store()
    {
        $this->validate([
            'answer_to_answer.body' => 'required'
        ]);
        $answer = $this->question->answers()->create([
            'body' => $this->answer_to_answer['body'],
            'user_id' => auth()->id()
        ]);
        $this->reset('answer_to_answer');
    }

    public function cancel()
    {
        $this->reset('answer_edit');
    }

    public function show_answers()
    {
        if ($this->cant < $this->question->answers()->count()) {
            $this->cant = $this->question->answers()->count();
        } else {
            $this->cant = 0;
        }
        $this->open = !$this->open;
    }


    public function render()
    {
        return view('livewire.answer');
    }
}
