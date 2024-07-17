<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Seguimientos extends Model
{
    use HasFactory;

    protected $fillable  = [
        'nombres', 
        'apellidos', 
        'asunto', 
        'correo', 
        'telefono', 
        'fecha_seguim_actual', 
        'num_dias',
        'fecha_prox_seguim'
    ];
}
