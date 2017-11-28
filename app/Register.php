<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Register extends Model
{
    protected $fillable = [
        'cuenta', 'destinatario', 'direccion', 'municipio', 'departamento', 'ruta', 'status', 'recibe', 'banco'
    ];
}
