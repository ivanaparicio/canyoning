<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pqr extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function type() :Attribute {
        return new Attribute(
            get: function($value){
                switch ($value) {
                    case '1':
                        return 'Petición';
                        break;
                    case '2':
                        return 'Queja';
                        break;
                    case '3':
                        return 'Reclamo';
                        break;
                    case '4':
                        return 'Sugerencia';
                        break;
                    
                    default:
                        # code...
                        break;
                }
            } 
        );
    }

}
