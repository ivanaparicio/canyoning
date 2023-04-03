<?php

namespace App\Http\Livewire;

use App\Models\Pqr;
use Livewire\Component;

class Pqrs extends Component
{

    public $names, $phone, $email, $type, $description;

    public function render()
    {
        return view('livewire.pqrs')->layout('layouts.app');
    }

    public function store(){

        $rules = [
            'names' => 'required|string|max:250',
            'phone' => 'required|integer|max:9999999999',
            'email' => 'required|string|email|max:250',
            'type' => 'required|integer|min:1|max:4',
            'description' => 'required|string|max:4000',
        ];

        $attributes = [
            'names' => 'nombre completo',
            'phone' => 'celular',
            'email' => 'correo',
            'type' => 'tipo de solicitud',
            'description' => 'detalle de la solicitud',
        ];

        $this->validate($rules, [], $attributes);

        Pqr::create([
            'names' => $this->names,
            'phone' => $this->phone,
            'email' => $this->email,
            'type' => $this->type,
            'description' => $this->description,
        ]);

        $this->reset(['names', 'phone', 'email', 'type', 'description']);
    
        return $this->emit('static-success', 'Solicitud enviada con éxito');
        
    }
}
