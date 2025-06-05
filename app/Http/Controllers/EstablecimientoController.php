<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Establecimiento;

class EstablecimientoController extends Controller
{
    public function index()
    {
        $establecimientos = Establecimiento::all();
        return view('establecimientos.index', compact('establecimientos'));
    }
    public function create()
    {
        return view('establecimientos.create');
    }

    public function store(Request $request)
    {
        $estado = $request->has('estado') ? 'activa' : 'inactiva';

        $validated = $request->validate([
            'nombre' => 'required|string|max:255',
            'direccion' => 'nullable|string|max:255',
            'telefono' => 'nullable|string|max:9',
            'email' => 'nullable|string|max:60',
            'tipo_establecimiento' => 'nullable|string',
            'descripcion' => 'nullable|string',
        ]);

        $validated['estado'] = $estado;

        Establecimiento::create($validated);

        return redirect()->route('establecimientos.index')->with('success', 'Establecimiento creado con éxito.');
    }

    public function edit($id)
    {
        $establecimiento = Establecimiento::findOrFail($id);
        return view('establecimientos.edit', compact('establecimiento'));
    }

    public function update(Request $request, $id)
    {
        $establecimiento = Establecimiento::findOrFail($id);

        $estado = $request->has('estado') ? 'activa' : 'inactiva';

        $validated = $request->validate([
            'nombre' => 'required|string|max:255',
            'direccion' => 'nullable|string|max:255',
            'telefono' => 'nullable|string|max:9',
            'email' => 'nullable|string|max:60',
            'tipo_establecimiento' => 'nullable|string',
            'descripcion' => 'nullable|string',
        ]);

        $validated['estado'] = $estado;

        $establecimiento->update($validated);

        return redirect()->route('establecimientos.index')->with('success', 'Establecimiento actualizado con éxito.');
    }

    public function destroy($id)
    {
        Establecimiento::findOrFail($id)->delete();
        return redirect()->route('establecimientos.index')->with('success', 'Establecimiento eliminado con éxito.');
    }
}
