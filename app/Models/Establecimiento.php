<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Establecimiento extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre',
        'direccion',
        'telefono',
        'email',
        'tipo_establecimiento',
        'descripcion',
        'estado',
    ];

    public function movimientos()
    {
        return $this->hasMany(Movimiento::class, 'establecimiento_id');
    }
}
