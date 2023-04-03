<?php

namespace App\Http\Livewire\Galleries;

use App\Models\Gallery;
use App\Models\Service;
use Livewire\Component;
use Livewire\WithPagination;

class Show extends Component
{   
    
    use WithPagination;

    public $service;

    public function mount(Service $service){
        $this->service = $service;
        
    }

    public function render()
    {
        $photos = Gallery::where('service_id', $this->service->id)->where('type', 0)->paginate(12);
        $videos = Gallery::where('service_id', $this->service->id)->where('type', 1)->paginate(12, ['*'], 'videosPage');
        return view('livewire.galleries.show', compact('photos', 'videos'));
    }
}
