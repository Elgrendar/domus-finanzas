<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Subcategoria;
use App\Models\Categoria;

class SubcategoriaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $subcategorias = Subcategoria::all();
        return view('subcategorias.index', compact('subcategorias'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
        public function create()
    {
        $categorias = Categoria::where('estado','activa')->get();
        return view('subcategorias.create', compact('categorias'));
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'tipo_subcategoria' => 'required|string|in:ingreso,gasto',
            'descripcion' => 'nullable|string|max:1000',
            'color' => 'nullable|string|max:7', // Para el color hexadecimal
            'icono' => 'nullable|string|max:255', // Para el icono
            'categoria_id' => 'required|exists:categorias,id', // Aseguramos que la categoría exista
        ]);
        // Convertimos el checkbox a string 'activa' o 'inactiva'
        $estado = $request->has('estado') ? 'activa' : 'inactiva';

        Subcategoria::create($request->only('nombre', 'tipo_subcategoria', 'descripcion', 'color', 'icono', 'categoria_id') + ['estado' => $estado]);

        return redirect()->route('subcategorias.index')->with('success', 'Subcategoría creada con éxito.');
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Subcategoria  $subcategoria
     * @return \Illuminate\Http\Response
     */
    public function edit(Subcategoria $subcategoria)
    {
        // Obtenemos las categorías activas para el formulario de edición
        $categorias = Categoria::where('estado', 'activa')->get();
        // Pasamos la subcategoría y las categorías al formulario de edición

        return view('subcategorias.edit', compact('subcategoria', 'categorias'));
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Subcategoria  $subcategoria
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Subcategoria $subcategoria)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'tipo_subcategoria' => 'required|string|in:ingreso,gasto',
            'descripcion' => 'nullable|string|max:1000',
            'color' => 'nullable|string|max:7', // Para el color hexadecimal
            'icono' => 'nullable|string|max:255', // Para el icono
            'categoria_id' => 'required|exists:categorias,id', // Aseguramos que la categoría exista
        ]);
        // Convertimos el checkbox a string 'activa' o 'inactiva'
        $estado = $request->has('estado') ? 'activa' : 'inactiva';

        $subcategoria->update($request->only('nombre', 'tipo_subcategoria', 'descripcion', 'color', 'icono', 'categoria_id') + ['estado' => $estado]);

        return redirect()->route('subcategorias.index')->with('success', 'Subcategoría actualizada con éxito.');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Subcategoria  $subcategoria
     * @return \Illuminate\Http\Response
     */
    public function destroy(Subcategoria $subcategoria)
    {
        $subcategoria->delete();

        return redirect()->route('subcategorias.index')->with('success', 'Subcategoría eliminada con éxito.');
    }
}
