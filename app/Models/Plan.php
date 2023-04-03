<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Plan extends Model
{
    use HasFactory;

    protected $guarded =['id'];

    public function description() : Attribute{
        return new Attribute(
            get: fn($value) => json_decode($value),
            set: fn($value) => json_encode($value)
        );
    }

}
