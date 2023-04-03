<?php

namespace App\Http\Livewire\Admin\Pqrs;

use App\Models\Pqr;
use Livewire\Component;

class Index extends Component
{

    public $selected;

    public function render()
    {
        $pqrs = Pqr::latest()->get();

        return view('livewire.admin.pqrs.index', compact('pqrs'))->layout('layouts.admin');
    }

    public function show(Pqr $pqr){
        $this->selected = $pqr;
    }

    public function close(){
        $this->reset('selected');
    }

    public function destroy(Pqr $pqr){
        $pqr->delete();
        $this->emit('success', 'Solicitud eliminada con éxito');
    }
}
