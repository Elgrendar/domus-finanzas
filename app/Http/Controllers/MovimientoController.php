<?php

namespace App\Http\Controllers;

use App\Models\Movimiento;
use App\Models\Cuenta;
use App\Models\FormaDePago;
use App\Models\Categoria;
use App\Models\Subcategoria;
use Illuminate\Http\Request;

class MovimientoController extends Controller
{
    public function index()
    {
        $movimientos = Movimiento::with(['cuenta', 'formaPago'])->get();
        return view('movimientos.index', compact('movimientos'));
    }

    public function create()
    {
        $cuentas = Cuenta::all();
        $formasDePago = FormaDePago::all();
        $categorias = Categoria::all();
        $subcategorias = Subcategoria::all();

        return view('movimientos.create', compact('cuentas', 'formasDePago', 'categorias', 'subcategorias'));
    }

    public function store(Request $request)
    {
        $estado = $request->has('estado') ? 'completado' : 'pendiente';

        $validated = $request->validate([
            'fecha' => 'required|date',
            'tipo_movimiento' => 'required|string|max:255',
            'descripcion' => 'nullable|string',
            'importe' => 'required|numeric',
            'cuenta_id' => 'required|exists:cuentas,id',
            'forma_pago_id' => 'required|exists:formas_de_pagos,id',
            'referencia' => 'nullable|string|max:255',
            'categoria' => 'nullable|exists:categorias,id',
            'subcategoria' => 'nullable|exists:subcategorias,id',
        ]);

        $validated['estado'] = $estado;

        Movimiento::create($validated);

        return redirect()->route('movimientos.index')->with('success', 'Movimiento creado con éxito.');
    }

    public function edit($id)
    {
        $movimiento = Movimiento::findOrFail($id);
        $cuentas = Cuenta::all();
        $formasDePago = FormaDePago::all();
        $categorias = Categoria::all();
        $subcategorias = Subcategoria::all();

        return view('movimientos.edit', compact('movimiento', 'cuentas', 'formasDePago', 'categorias', 'subcategorias'));
    }

    public function update(Request $request, $id)
    {
        $movimiento = Movimiento::findOrFail($id);
        $estado = $request->has('estado') ? 'completado' : 'pendiente';

        $validated = $request->validate([
            'fecha' => 'required|date',
            'tipo_movimiento' => 'required|string|max:255',
            'descripcion' => 'nullable|string',
            'importe' => 'required|numeric',
            'cuenta_id' => 'required|exists:cuentas,id',
            'forma_pago_id' => 'required|exists:formas_de_pagos,id',
            'referencia' => 'nullable|string|max:255',
            'categoria' => 'nullable|exists:categorias,id',
            'subcategoria' => 'nullable|exists:subcategorias,id',
        ]);

        $validated['estado'] = $estado;

        $movimiento->update($validated);

        return redirect()->route('movimientos.index')->with('success', 'Movimiento actualizado con éxito.');
    }

    public function destroy($id)
    {
        Movimiento::findOrFail($id)->delete();
        return redirect()->route('movimientos.index')->with('success', 'Movimiento eliminado con éxito.');
    }

}
