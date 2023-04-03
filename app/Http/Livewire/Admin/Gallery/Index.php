<?php

namespace App\Http\Livewire\Admin\Gallery;

use App\Models\Gallery;
use App\Models\Service;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{

    use WithPagination;

    protected $listeners = ['render'];

    public $services, $service_id;

    public function mount(){
        $this->services = Service::all();
    }

    public function updatedServiceId(){
        $this->resetPage();
    }

    public function render()
    {   
        $galleries = Gallery::where('service_id', $this->service_id)->paginate(9);
        return view('livewire.admin.gallery.index', compact('galleries'))->layout('layouts.admin');
    }

    public function destroy(Gallery $gallery){
        if ($gallery->type == 0) {
            Storage::delete($gallery->image->url);
            $gallery->image->delete();
        }

        $gallery->delete();
    }


}
