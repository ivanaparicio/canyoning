<?php

namespace App\Http\Livewire\Admin\Banner;

use App\Models\Banner;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;

class Index extends Component
{

    use WithFileUploads;

    public $image;

    public function render()
    {
        $banners = Banner::orderBy('order', 'ASC')->get();
        return view('livewire.admin.banner.index', compact('banners'))->layout('layouts.admin');
    }

    public function store(){
        $this->validate(['image' => 'required|image|max:2048'], [], ['image', 'imagen']);

        $url = $this->image->store('images/banner');

        Banner::create([
            'url' => $url,
            'order' => Banner::count() ? Banner::max('order') + 1 : 1,
        ]);

        $this->reset('image');

        $this->emit('success', 'Imagen agregada con éxito');
    }

    public function destroy(Banner $banner){
        Storage::delete($banner->url);
        $banner->delete();
        $this->emit('success', 'Imagen eliminada con éxito');
    }
}
