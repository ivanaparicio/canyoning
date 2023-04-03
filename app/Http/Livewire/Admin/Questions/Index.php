<?php

namespace App\Http\Livewire\Admin\Questions;

use App\Models\Question;
use Livewire\Component;

class Index extends Component
{

    public $question = [
        'ask' => '',
        'response' => '',
    ];

    protected $validationAttributes = [
        'ask' => 'pregunta',
        'response' => 'respuesta',
    ];

    public $isUpdate = false , $question_id=null;

    protected function rules(){
        return [
            'question.ask' => 'required|string|max:250',
            'question.response' => 'required|string|max:2000',
        ];
    }

    public function render()
    {
        $questions = Question::all();
        return view('livewire.admin.questions.index', compact('questions'))->layout('layouts.admin');
    }

    public function store(){

        $this->validate();

        Question::create($this->question);

        $this->emit('success', 'Pregunta creada con éxito');

        $this->reset('question');

    }

    public function edit(Question $question){

        $this->question_id = $question->id;

        $this->question['ask'] = $question->ask;
        $this->question['response'] = $question->response;

        $this->isUpdate = true;
    }
    
    public function update(){
        $this->validate();
        Question::where('id', $this->question_id)->update($this->question);
        $this->emit('success', 'Pregunta actualizada con éxito');
        $this->cancel();
    }

    public function cancel(){
        $this->reset(['question', 'question_id', 'isUpdate']);
    }

    public function destroy(){
        Question::where('id', $this->question_id)->delete();
        $this->emit('success', 'Pregunta eliminada con éxito');
        $this->cancel();
    }

}
