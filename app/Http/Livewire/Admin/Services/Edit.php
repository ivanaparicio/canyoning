<?php

namespace App\Http\Livewire\Admin\Services;

use App\Models\Service;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Str;

class Edit extends Component
{

    use WithFileUploads;

    public $service, $body='', $image;

    protected $validationAttributes = [
        'image' => 'imagen de portada',
        'title' => 'nombre del servicio',
        'content' => 'descripción corta',
        'body' => 'descripción larga',
        'status' => 'estado',
    ];

    protected function rules(){
        return [
            'image' => 'nullable|image',
            'service.title' => 'required|string|max:250|unique:services,title,' . $this->service->id, 
            'service.content' => 'required|string|max:1000',
            'body' => 'required|string|max:3000',
            'service.status' => 'required|integer|min:0|max:1',
        ];
    }

    public function mount(Service $service)
    {
        $this->service = $service;
        $this->body = $service->body;
    }

    public function render()
    {
        return view('livewire.admin.services.edit')->layout('layouts.admin');
    }

    public function update()
    {

        $this->validate();

        $this->service->slug = Str::slug($this->service->title);
        $this->service->body = $this->body;
        $this->service->save();

        if ($this->image) {

            Storage::delete($this->service->image->url);
            $this->service->image->delete();

            $url = $this->image->store('images/services');
            
            $this->service->image()->create([
                'url' => $url,
            ]);

        }

        return redirect()->route('services.index')->with('success', 'Servicio creado con éxito');

    }
}
