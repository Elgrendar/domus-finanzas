<?php

namespace App\Observers;

use App\Models\Movimiento;
use App\Models\Cuenta;

class MovimientoObserver
{
    /**
     * Handle the Movimiento "created" event.
     */
    public function created(Movimiento $movimiento): void
    {
        $this->ajustarSaldo($movimiento, 'crear');
    }

    /**
     * Handle the Movimiento "updated" event.
     */
    public function updated(Movimiento $movimiento): void
    {
        $original = $movimiento->getOriginal();

        // Revertir el movimiento anterior
        $this->ajustarSaldo((object)[
            'cuenta_id' => $original['cuenta_id'],
            'tipo_movimiento' => $original['tipo_movimiento'],
            'importe' => $original['importe'],
        ], 'eliminar');

        // Aplicar el nuevo
        $this->ajustarSaldo($movimiento, 'crear');
    }

    /**
     * Handle the Movimiento "deleted" event.
     */
    public function deleted(Movimiento $movimiento): void
    {
        $this->ajustarSaldo($movimiento, 'eliminar');
    }

    protected function ajustarSaldo($movimiento, $accion)
    {
        $cuenta = Cuenta::find($movimiento->cuenta_id);
        if (!$cuenta) return;

        $factor = ($movimiento->tipo_movimiento === 'ingreso') ? 1 : -1;
        $multiplicador = ($accion === 'eliminar') ? -1 : 1;

        $cuenta->saldo_actual += $factor * $multiplicador * $movimiento->importe;
        $cuenta->save();
    }
}
