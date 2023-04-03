<?php

namespace App\Http\Livewire\Admin\Banner;

use App\Models\Banner;
use Livewire\Component;

class Order extends Component
{

    public $banners=[], $orders=[];

    public function mount(){
        $this->getBanners();
    }

    public function render()
    {
        return view('livewire.admin.banner.order')->layout('layouts.admin');
    }

    protected function getBanners(){
        $this->banners = Banner::select('id', 'url', 'order')
                                    ->orderBy('order', 'ASC')
                                    ->get()
                                    ->toArray();
    }

    public function saveOrder(){

        foreach ($this->orders as $item) {
            Banner::whereId($item['id'])->update(["order" => $item['order']]);
        }

        $this->getBanners();

        return $this->emit('success', 'Orden guardado con éxito');
    }
}
