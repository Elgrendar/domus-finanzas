<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categoria;

class CategoriaController extends Controller
{
    public function index()
    {
        $categorias = Categoria::all();
        return view('categorias.index', compact('categorias'));
    }

    public function create()
    {
        return view('categorias.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'tipo_categoria' => 'required|string|in:ingreso,gasto',
            'descripcion' => 'nullable|string|max:1000',
            'color' => 'nullable|string|max:7', // Para el color hexadecimal
            'icono' => 'nullable|string|max:255', // Para el icono
        ]);
        // Convertimos el checkbox a string 'activa' o 'inactiva'
        $estado = $request->has('estado') ? 'activa' : 'inactiva';
        // Creamos la categoría con los datos del request y el estado
        Categoria::create($request->only('nombre', 'tipo_categoria', 'descripcion', 'color', 'icono') + ['estado' => $estado]);

        return redirect()->route('categorias.index')->with('success', 'Categoría creada con éxito.');
    }

    public function edit(Categoria $categoria)
    {
        return view('categorias.edit', compact('categoria'));
    }

    public function update(Request $request, Categoria $categoria)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'tipo_categoria' => 'required|string|in:ingreso,gasto',
            'descripcion' => 'nullable|string|max:1000',
            'color' => 'nullable|string|max:7', // Para el color hexadecimal
            'icono' => 'nullable|string|max:255', // Para el icono
        ]);
        // Convertimos el checkbox a string 'activo' o 'inactivo'
        $estado = $request->has('estado') ? 'activa' : 'inactiva';

        $categoria->update($request->only('nombre', 'tipo_categoria', 'descripcion', 'color', 'icono') + ['estado' => $estado]);

        return redirect()->route('categorias.index')->with('success', 'Categoría actualizada con éxito.');
    }
    public function destroy(Categoria $categoria)
    {
        $categoria->delete();

        return redirect()->route('categorias.index')->with('success', 'Categoría eliminada con éxito.');
    }
}
