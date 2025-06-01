<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FormaDePago extends Model
{
    use HasFactory;

    protected $table = 'formas_de_pagos';

    protected $fillable = [
        'nombre',
        'tipo_pago',
        'descripcion',
        'estado',
    ];
}
