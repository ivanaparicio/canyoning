<?php

namespace App\Http\Livewire\Admin\Services;

use App\Models\Service;
use Illuminate\Support\Arr;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Str;

class Create extends Component
{

    use WithFileUploads;

    public $keyMain=0, $preImages=[];

    public $images=[], $title, $content, $body = '', $status = '1';

    protected $validationAttributes = [
        'images'    => 'imagenes',
        'title'     => 'nombre del servicio',
        'content'   => 'descripción corta',
        'body'      => 'descripción larga',
        'status'    => 'estado',
    ];

    protected function rules()
    {
        return [
            'images'    => 'required|array',
            'images.*'  => 'required|image',
            'title'     => 'required|string|max:250|unique:services',
            'content'   => 'required|string|max:1000',
            'body'      => 'required|string|max:3000',
            'status'    => 'required|integer|min:0|max:1',
        ];
    }

    public function updatedPreImages($value){
        $this->validate(['preImages.*' => 'required|image'], [], ['preImages' => 'imagenes']);
        foreach ($value as $key => $image) {
            $this->images[] = $image;
        }
    }

    public function render()
    {
        return view('livewire.admin.services.create')->layout('layouts.admin');
    }

    public function store()
    {

        $this->validate();

        $service = Service::create([
            'title'     => $this->title,
            'slug'      => Str::slug($this->title),
            'content'   => $this->content,
            'body'      => $this->body,
            'status'    => $this->status,
        ]);        

        foreach ($this->images as $key => $image) {

            $url = $image->store('images/services');

            $service->image()->create([
                'is_main' => $this->keyMain == $key ? 1 : 0,
                'url' => $url,
            ]);

        }

        return redirect()->route('services.index')->with('success', 'Servicio creado con éxito');
    }

    public function deleteImage($key){
        unset($this->images[$key]);
    }
}
