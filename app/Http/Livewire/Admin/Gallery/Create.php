<?php

namespace App\Http\Livewire\Admin\Gallery;

use App\Models\Gallery;
use Livewire\Component;
use Livewire\WithFileUploads;

class Create extends Component
{
    use WithFileUploads;
    
    protected $listeners = ['openCreate'];

    public $open=false;

    public $service_id, $image, $link, $type;

    public function render()
    {
        return view('livewire.admin.gallery.create');
    }

    public function openCreate($service_id){
        $this->reset();
        $this->service_id = $service_id;
        $this->open = true;
    }

    public function store(){

        $rules = [
            'type' => 'required|integer|min:0|max:1',
            'link' => 'exclude_if:type,0|max:250',
            'image' => 'exclude_if:type,1|image',
        ];

        $attributes = [
            'type' => 'tipo',
            'link' => 'link del vídeo',
            'image' => 'image',
        ];

        $this->validate($rules, [], $attributes);

        $gallery = Gallery::create([
            'type' => $this->type,
            'link' => $this->type == 1 ? $this->getUrl(): '',
            'service_id' => $this->service_id,
        ]);

        if ($this->type == 0) {

            $url = $this->image->store('images/gellary');

            $gallery->image()->create([
                'url' => $url,
            ]);

        }

        $this->reset();

        $this->emitTo('admin.gallery.index', 'render');

        return $this->emit('success', 'Registro guardado con éxito');

    }

    public function getUrl(){
        $patron = '/^(?:https?:\/\/)?(?:www\.)?(?:youtu\.be\/|youtube\.com\/(?:embed\/|v\/|watch\?v=|watch\?.+&v=))((\w|-){11})(?:\S+)?$/';
        $array = preg_match($patron, $this->link, $parte);
        return '<iframe width="560" height="315" src="https://www.youtube.com/embed/'. $parte[1] .'" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>';
    }

    public function close(){
        $this->open = false;
    }
}
