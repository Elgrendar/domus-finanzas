<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cuenta extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre',
        'tipo_cuenta',
        'saldo_inicial',
        'fecha_apertura',
        'moneda',
        'descripcion',
        'estado',
        'usuario_id',
        'saldo_actual',
        'limite_credito',
        'numero_cuenta',
        'banco',
    ];

    public function usuario()
    {
        return $this->belongsTo(User::class, 'usuario_id');
    }
}
