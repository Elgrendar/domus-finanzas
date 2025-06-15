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

    public function categoria()
    {
        return $this->belongsTo(Categoria::class);
    }

    public function subcategoria()
    {
        return $this->belongsTo(Subcategoria::class);
    }

    public function establecimiento()
    {
        return $this->belongsTo(Establecimiento::class);
    }
    /**
     * Obtiene el total de ingresos del mes actual.
     *
     * @return float
     */

    public static function ingresosEsteMes()
    {
        return Movimiento::where('tipo_movimiento', 'ingreso')
            ->whereMonth('fecha', now()->month)
            ->sum('importe');
    }

    /**
     * Obtiene el total de gastos del mes actual.
     *
     * @return float
     */
    public static function gastosEsteMes()
    {
        return Movimiento::where('tipo_movimiento', 'gasto')
            ->whereMonth('fecha', now()->month)
            ->sum('importe');
    }
}
