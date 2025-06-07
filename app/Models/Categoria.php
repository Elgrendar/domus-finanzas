<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre',
        'descripcion',
        'tipo_categoria',
        'icono',
        'color',
        'estado',
    ];

    public function subcategorias()
    {
        return $this->hasMany(Subcategoria::class);
    }

    public function movimientos()
    {
        return $this->hasMany(Movimiento::class, 'categoria_id');
    }
}

