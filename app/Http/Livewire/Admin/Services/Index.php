<?php

namespace App\Http\Livewire\Admin\Services;

use App\Models\Service;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;

class Index extends Component
{

    public function render()
    {
        $services = Service::latest()->get();
        return view('livewire.admin.services.index', compact('services'))->layout('layouts.admin');
    }

    public function destroy(Service $service)
    {
        if (!$service->galleries->count()) {

            foreach ($service->images as $image) {
                Storage::delete($image->url);
                $image->delete();
            }

            $service->delete();

            $this->emit('success', 'Servicio eliminado con éxito');
        }else{
            $this->emit('alert', 'Este servicio no puede ser eliminado. Debes eliminar la gallería de este servicio.');
        }
    }
}
