<?php

namespace App\Http\Livewire\Admin\Company;

use App\Models\Company;
use Livewire\Component;

class Index extends Component
{   

    public $company;

    protected $validationAttributes = [
        'company.address' => 'dirección',
        'company.phone1' => 'celular 1',
        'company.phone2' => 'celular 2',
        'company.hours' => 'horario',
        'company.maps' => 'mapa',
    ];

    protected function rules(){
        return [
            'company.email' => 'nullable|email|max:250',
            'company.address' => 'nullable|max:250',
            'company.phone1' => 'nullable|integer|max:9999999999',
            'company.phone2' => 'nullable|integer|max:9999999999',
            'company.hours' => 'nullable|max:250',
            'company.whatsapp' => 'nullable|integer|max:9999999999',
            'company.instagram' => 'nullable|max:250',
            'company.facebook' => 'nullable|max:250',
            'company.youtube' => 'nullable|max:250',
            'company.maps' => 'nullable|max:1000',
        ];
    }

    public function mount(){
        $this->company = Company::first();
    }

    public function render()
    {
        return view('livewire.admin.company.index')->layout('layouts.admin');
    }

    public function update(){
        $this->validate();
        $this->company->save();
        return $this->emit('success', 'Información de la empresa actualizada con éxito');
    }
}
