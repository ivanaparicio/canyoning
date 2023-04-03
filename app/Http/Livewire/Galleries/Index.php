<?php

namespace App\Http\Livewire\Galleries;

use App\Models\Service;
use Livewire\Component;

class Index extends Component
{
    
    public $services;

    public function mount(){
        $this->services = Service::whereHas('galleries')->get();
    }
    
    public function render()
    {
        return view('livewire.galleries.index');
    }
}
