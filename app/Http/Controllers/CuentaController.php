<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cuenta;

class CuentaController extends Controller
{
    public function index()
    {
        $cuentas = Cuenta::all();
        return view('cuentas.index', compact('cuentas'));
    }

    public function create()
{
    return view('cuentas.create');
}

public function store(Request $request)
{
    $estado = $request->has('estado') ? 'activa' : 'inactiva';

    $validated = $request->validate([
        'nombre' => 'required|string|max:255',
        'tipo_cuenta' => 'required|string|max:255',
        'saldo_inicial' => 'nullable|numeric',
        'fecha_apertura' => 'nullable|date',
        'moneda' => 'nullable|string|max:10',
        'descripcion' => 'nullable|string',
        'estado' => 'required|in:activa,inactiva',
        'usuario_id' => 'nullable|exists:users,id',
        'saldo_actual' => 'nullable|numeric',
        'limite_credito' => 'nullable|numeric',
        'numero_cuenta' => 'nullable|string|max:50',
        'banco' => 'nullable|string|max:255',
    ]);

    $validated['estado'] = $estado;

    Cuenta::create($validated);

    return redirect()->route('cuentas.index')->with('success', 'Cuenta creada con éxito.');
}

public function edit($id)
{
    $cuenta = Cuenta::findOrFail($id);
    return view('cuentas.edit', compact('cuenta'));
}

public function update(Request $request, $id)
{
    $cuenta = Cuenta::findOrFail($id);

    $estado = $request->has('estado') ? 'activa' : 'inactiva';

    $validated = $request->validate([
        'nombre' => 'required|string|max:255',
        'tipo_cuenta' => 'required|string|max:255',
        'saldo_inicial' => 'nullable|numeric',
        'fecha_apertura' => 'nullable|date',
        'moneda' => 'nullable|string|max:10',
        'descripcion' => 'nullable|string',
        'estado' => 'required|in:activa,inactiva',
        'usuario_id' => 'nullable|exists:users,id',
        'saldo_actual' => 'nullable|numeric',
        'limite_credito' => 'nullable|numeric',
        'numero_cuenta' => 'nullable|string|max:50',
        'banco' => 'nullable|string|max:255',
    ]);

    $validated['estado'] = $estado;

    $cuenta->update($validated);

    return redirect()->route('cuentas.index')->with('success', 'Cuenta actualizada con éxito.');
}

public function destroy($id)
{
    Cuenta::findOrFail($id)->delete();
    return redirect()->route('cuentas.index')->with('success', 'Cuenta eliminada con éxito.');
}

}
