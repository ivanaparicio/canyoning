<?php

namespace App\Http\Livewire\Admin\Reviews;

use App\Models\Review;
use Livewire\Component;
use Livewire\WithFileUploads;

class Create extends Component
{

    use WithFileUploads;

    protected $listeners = ['openCreate'];

    public $open=false;

    public $name, $description, $link, $image;

    public function render()
    {
        return view('livewire.admin.reviews.create');
    }

    public function openCreate(){
        $this->reset();
        $this->open = true;
    }

    public function store(){

        $rules = [
            'image' => 'nullable|image|max:2048',
            'name' => 'required|string|max:250',
            'link' => 'required|string|max:500',
            'description' => 'required|string|max:2000'
        ];

        $attributes = [
            'image' => 'imagen',
            'name' => 'nombre',
            'description' => 'reseña',
        ];

        $this->validate($rules, [], $attributes);

        $url = '';

        if ($this->image) {
            $url = $this->image->store('images/reviews');
        }

        Review::create([
            'name' => $this->name,
            'profile' => $url,
            'link' => $this->link,
            'description' => $this->description,
        ]);

        $this->reset();

        $this->emitTo('admin.reviews.index', 'render');
        $this->emit('success', 'Reseña agregada con éxito');
        
    }
}
