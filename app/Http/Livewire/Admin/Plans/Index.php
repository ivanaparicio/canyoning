<?php

namespace App\Http\Livewire\Admin\Plans;

use App\Models\Plan;
use Livewire\Component;

class Index extends Component
{

    protected $listeners = ['render'];

    public function render()
    {   
        $plans = Plan::all();
        return view('livewire.admin.plans.index', compact('plans'))->layout('layouts.admin');
    }


    public function destroy(Plan $plan){
        $plan->delete();
        return $this->emit('success', 'Plan eliminado con éxito');
    }
}
