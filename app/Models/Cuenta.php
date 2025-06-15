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

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function movimientos()
    {
        return $this->hasMany(Movimiento::class, 'cuenta_id');
    }

    public function formaPagos()
    {
        return $this->hasMany(FormaDePago::class, 'cuenta_id');
    }
    /**
     * Obtiene el total de saldo actual para una cuenta específica o para todas.
     * * @param int|null $cuentaId
     * @return float
     */
    public static function saldoTotal($cuentaId = null)
    {
        if ($cuentaId) {
            $cuenta = Cuenta::find($cuentaId);
            if ($cuenta) {
                return $cuenta->saldo_actual;
            }
            return 0.0; // Si no se encuentra la cuenta, retorna 0
        }

        // Si no se proporciona un ID de cuenta, retorna el saldo total de todas las cuentas
        return Cuenta::sum('saldo_actual');
    }
}
