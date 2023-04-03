<?php

namespace App\Http\Livewire\Admin\Plans;

use App\Models\Plan;
use Livewire\Component;

class Create extends Component
{

    protected $listeners = [ 'openCreate' ];

    public $open=false;

    public $title, $price, $description=[], $include, $status=1;

    public $key=null;

    public function render()
    {
        return view('livewire.admin.plans.create');
    }

    public function openCreate(){
        
        $this->open = true;
    }

    public function add()
    {
        if ($this->include) {
            $this->description[] = $this->include;
            $this->reset('include');
        }
    }

    public function edit($key)
    {
        $this->key = $key;
        $this->include = $this->description[$key];
    }

    public function save(){
        $this->description[$this->key] = $this->include;
        $this->reset('include', 'key');
    }

    public function cancel(){
        $this->reset('include', 'key');
    }

    public function delete($key){
        unset($this->description[$key]);
    }

    public function store()
    {

        $rules = [
            'title' => 'required|string|max:250',
            'price' => 'nullable|string|max:250',
            'description' => 'required|array',
            'status' => 'required|min:0|max:1',
        ];

        $attributes = [
            'title' => 'Nombre del plan',
            'price' => 'precio',
            'descriprion' => 'incluye',
        ];

        $data = $this->validate($rules, [], $attributes);

        Plan::create($data);

        $this->reset();
        
        $this->emitTo('admin.plans.index', 'render');
        return $this->emit('success', 'Plan actualizado con éxito');
        

    }
}
