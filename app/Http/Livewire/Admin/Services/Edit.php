<?php

namespace App\Http\Livewire\Admin\Services;

use App\Models\Image;
use App\Models\Service;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Str;

class Edit extends Component
{

    use WithFileUploads;

    public $keyMain, $newOrSaved=0;

    public $preImages=[], $savedImages, $deletedImages;

    public $service, $body='', $images=[];

    protected $validationAttributes = [
        'images'     => 'imagen de portada',
        'title'     => 'nombre del servicio',
        'content'   => 'descripción corta',
        'body'      => 'descripción larga',
        'status'    => 'estado',
    ];

    protected function rules(){
        return [
            'images'            => 'nullable|array',
            'images.*'          => 'nullable|image',
            'service.title'     => 'required|string|max:250|unique:services,title,' . $this->service->id, 
            'service.content'   => 'required|string|max:1000',
            'body'              => 'required|string|max:3000',
            'service.status'    => 'required|integer|min:0|max:1',
        ];
    }

    public function mount(Service $service)
    {
        $this->service = $service;
        $this->body = $service->body;
        $this->savedImages = $service->images;
        $this->deletedImages = collect();
        $this->savedImages->each(function($item, $key){
            if ($item->is_main) return $this->keyMain = $item->id;
        });
    }

    public function updatedPreImages($value){
        $this->validate(['preImages.*' => 'required|image'], [], ['preImages' => 'imagenes']);
        foreach ($value as $key => $image) {
            $this->images[] = $image;
        }
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

        Image::where('imageable_id', $this->service->id)
                ->where('imageable_type', Service::class)
                ->update(['is_main' => 0]);

        foreach ($this->images as $key => $image) {

            $url = $image->store('images/services');

            $this->service->image()->create([
                'is_main' => $this->keyMain == $key && $this->newOrSaved == 1 ? 1 : 0,
                'url' => $url,
            ]);

        }

        foreach ($this->service->images as $key => $image) {

            if ($this->deletedImages->contains($image->id)) {
                Storage::delete($image->url);
                $image->delete();
            }

        }

        if ($this->newOrSaved == 0) {
            Image::where('imageable_id', $this->service->id)
                    ->where('imageable_type', Service::class)
                    ->where('id', $this->keyMain)
                    ->update(['is_main' => 1]);
        }


        return redirect()->route('services.index')->with('success', 'Servicio creado con éxito');

    }

    public function selectMain($key, $newOrSaved){
        $this->keyMain = $key;
        $this->newOrSaved = $newOrSaved;
    }

    public function deleteSavedImage($key){
        $this->deletedImages->push($key);
        $this->savedImages = $this->savedImages->filter(fn($item) => !$this->deletedImages->contains($item->id));
    }

    public function deleteImage($key){
        unset($this->images[$key]);
    }
}
