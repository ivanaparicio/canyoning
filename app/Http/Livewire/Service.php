<?php

namespace App\Http\Livewire;

use App\Models\Service as ModelsService;
use Livewire\Component;

class Service extends Component
{

    public $service;

    public function mount(ModelsService $service)
    {
        $this->service = $service;
    }

    public function render()
    {   
        $services = ModelsService::where('status', 1)->take(10)->get();
        return view('livewire.service', compact('services'));
    }
}
