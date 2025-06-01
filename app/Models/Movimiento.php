<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Movimiento extends Model
{
    use HasFactory;

    protected $fillable = [
        'fecha',
        'tipo_movimiento',
        'descripcion',
        'importe',
        'cuenta_id',
        'forma_pago_id',
        'estado',
        'referencia',
        'categoria',
        'subcategoria',
    ];

    public function cuenta()
    {
        return $this->belongsTo(Cuenta::class);
    }

    public function formaPago()
    {
        return $this->belongsTo(FormaDePago::class, 'forma_pago_id');
    }
}
