<?php

namespace App\Http\Livewire\Admin\Reviews;

use App\Models\Review;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;

class Index extends Component
{

    protected $listeners = ['render'];

    public function render()
    {   

        $reviews = Review::latest()->get();

        return view('livewire.admin.reviews.index', compact('reviews'))->layout('layouts.admin');
    }

    public function destroy(Review $review){

        if ($review->profile) {
            Storage::delete($review->profile);
        }

        $review->delete();
        $this->emit('success', 'Reseña eliminada con éxito');
    }

    
}
