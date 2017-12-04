<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Register extends Model
{
    /**
     * @var array
     */
    protected $fillable = [
        'cuenta', 'destinatario', 'direccion', 'municipio', 'departamento', 'ruta', 'status', 'recibe', 'banco', 'observaciones', 'corte', 'fecha'
    ];

    /**
     * @var array
     */
    protected $dates = ['fecha'];
}
