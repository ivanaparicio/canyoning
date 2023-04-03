<?php

namespace App\Http\Livewire;

use App\Models\Company;
use App\Models\Plan;
use Livewire\Component;

class Plans extends Component
{
    public function render()
    {   
        $whatsapp = Company::first()->whatsapp;   
        $plans = Plan::where('status', 1)->get();
        return view('livewire.plans', compact('plans', 'whatsapp'));
    }
}
