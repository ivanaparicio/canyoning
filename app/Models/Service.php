<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

    protected $guarded=['id'];

    public function image(){
        return $this->morphOne(Image::class, 'imageable');
    }

    public function galleries(){
        return $this->hasMany(Gallery::class);
    }

    public function getRouteKeyName(){
        return "slug";
    }


}
