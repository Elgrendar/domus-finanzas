<?php

namespace App\Http\Controllers;

use App\Models\FormaDePago;
use Illuminate\Http\Request;

class FormaDePagoController extends Controller
{
    public function index()
    {
        $formasdepago = FormaDePago::all();
        return view('formasdepago.index', compact('formasdepago'));
    }
    public function create()
    {
        return view('formasdepago.create');
    }

    public function store(Request $request)
    {
        $estado = $request->has('estado') ? 'activa' : 'inactiva';

        $validated = $request->validate([
            'nombre' => 'required|string|max:255',
            'tipo_pago' => 'required|string|max:255',
            'descripcion' => 'required|string|max:255',
        ]);

        $validated['estado'] = $estado;

        FormaDePago::create($validated);

        return redirect()->route('formasdepago.index')->with('success', 'Forma de Pago creada con éxito.');
    }

    public function edit($id)
    {
        $formasdepago = FormaDePago::findOrFail($id);
        return view('formasdepago.edit', compact('formasdepago'));
    }

    public function update(Request $request, $id)
    {
        $formasdepago = FormaDePago::findOrFail($id);

        $estado = $request->has('estado') ? 'activa' : 'inactiva';

        $validated = $request->validate([
            'nombre' => 'required|string|max:255',
            'tipo_pago' => 'required|string|max:255',
            'descripcion' => 'required|string|max:255',
        ]);

        $validated['estado'] = $estado;

        $formasdepago->update($validated);

        return redirect()->route('formasdepago.index')->with('success', 'Forma de Pago actualizada con éxito.');
    }

    public function destroy($id)
    {
        FormaDePago::findOrFail($id)->delete();
        return redirect()->route('formasdepago.index')->with('success', 'Forma de Pago eliminada con éxito.');
    }
}
