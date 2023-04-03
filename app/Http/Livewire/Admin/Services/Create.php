<?php

namespace App\Http\Livewire\Admin\Services;

use App\Models\Service;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Str;

class Create extends Component
{

    use WithFileUploads;

    public $image, $title, $content, $body='', $status='1';

    protected $validationAttributes = [
        'image' => 'imagen de portada',
        'title' => 'nombre del servicio',
        'content' => 'descripción corta',
        'body' => 'descripción larga',
        'status' => 'estado',
    ];

    protected function rules(){
        return [
            'image' => 'required|image',
            'title' => 'required|string|max:250|unique:services', 
            'content' => 'required|string|max:1000',
            'body' => 'required|string|max:3000',
            'status' => 'required|integer|min:0|max:1',
        ];
    }

    public function render()
    {
        return view('livewire.admin.services.create')->layout('layouts.admin');
    }

    public function store(){

        $this->validate();

        
        $service = Service::create([
            'title' => $this->title,
            'slug' => Str::slug($this->title),
            'content' => $this->content,
            'body' => $this->body,
            'status' => $this->status,
        ]);

        $url = $this->image->store('images/services');

        $service->image()->create([
            'url' => $url,
        ]);

        return redirect()->route('services.index')->with('success', 'Servicio creado con óxito');
    }
}
