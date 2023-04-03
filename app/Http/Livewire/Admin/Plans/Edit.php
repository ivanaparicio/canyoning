<?php

namespace App\Http\Livewire\Admin\Plans;

use App\Models\Plan;
use Livewire\Component;

class Edit extends Component
{
    protected $listeners = ['openEdit'];

    public $open = false;

    public $plan;

    public $title, $price, $description, $include, $status=1;

    public $key=null;

    public function render()
    {
        return view('livewire.admin.plans.edit');
    }

    public function openEdit(Plan $plan)
    {
        $this->reset();
        $this->title = $plan->title;
        $this->price = $plan->price;dump($plan->description);
        $this->description = $plan->description;
        $this->status = $plan->status;

        $this->plan = $plan;
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

    public function update()
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
            'description' => 'incluye',
        ];

        $data = $this->validate($rules, [], $attributes);

        $this->plan->fill($data);
        $this->plan->save();

        $this->reset();

        $this->emitTo('admin.plans.index', 'render');
        return $this->emit('success', 'Plan actualizado con éxito');
        

    }
}
