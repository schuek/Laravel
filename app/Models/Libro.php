<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Libro extends Model
{
    //use HasFactory;

    protected $fillable = [
        'titulo',
        'autor',
        'anho',
        'genero',
        'descripcion'
    ];
}
