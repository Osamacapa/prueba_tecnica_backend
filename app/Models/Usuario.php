<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    use HasFactory;

    protected $fillable = [
        'cedula',
        'id_categoria',
        'nombres',
        'apellidos',
        'email',
        'pais',
        'direccion',
        'celular',
    ];
}
