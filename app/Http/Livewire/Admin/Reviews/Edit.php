<?php

namespace App\Http\Livewire\Admin\Reviews;

use App\Models\Review;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;

class Edit extends Component
{

    use WithFileUploads;

    protected $listeners = ['openEdit'];

    public $open = false;

    public $review;

    public $image;

    protected $rules = [
        'image' => 'nullable|image|max:2048',
        'review.name' => 'required|string|max:250',
        'review.link' => 'required|string|max:500',
        'review.description' => 'required|string|max:2000'
    ];

    protected $validationAttributes = [
        'image' => 'imagen',
        'review.name' => 'nombre',
        'review.description' => 'reseña',
    ];

    public function render()
    {
        return view('livewire.admin.reviews.edit');
    }

    public function openEdit(Review $review)
    {
        $this->reset();
        $this->open = true;
        $this->review = $review;
    }

    public function store()
    {

        $this->validate();
        
        $url = '';
        
        if ($this->image) {
            Storage::delete($this->review->profile);
            $url = $this->image->store('images/reviews');
            $this->review->profile = $url;
        }

        $this->review->save();

        $this->reset();

        $this->emitTo('admin.reviews.index', 'render');
        $this->emit('success', 'Reseña actualizada con éxito');
    }
}
