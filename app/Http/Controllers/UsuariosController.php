<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class UsuariosController extends Controller
{
    public function index()
    {
        $usuarios = User::all();
        return view('usuarios.index', compact('usuarios'));
    }

    public function create()
    {
        return view('usuarios.create');
    }

    public function store(Request $request)
    {
        $request->merge([
            'estado' => $request->has('estado') ? 'activa' : 'inactiva'
        ]);
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email',
            'imagen' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',
            'password' => 'required|string|min:8|confirmed',
        ]);

        $imagenNombre = null;
        if ($request->hasFile('imagen')) {
            $imagenNombre = uniqid() . '.' . $request->imagen->extension();
            $request->imagen->move(public_path('images/users'), $imagenNombre);
        }

        User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'imagen' => $imagenNombre,
            'estado' => $request->input('estado', 'inactiva'),
            'password' => Hash::make($validated['password']),
        ]);

        return redirect()->route('usuarios.index')->with('success', 'Usuario creado correctamente.');
    }

    public function edit(User $usuario)
    {
        return view('usuarios.edit', compact('usuario'));
    }

    public function update(Request $request, User $usuario)
    {
        $request->merge([
            'estado' => $request->has('estado') ? 'activa' : 'inactiva'
        ]);
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => [
                'required',
                'email',
                'max:255',
                Rule::unique('users', 'email')->ignore($usuario->id),
            ],
            'imagen' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',
            'password' => 'nullable|string|min:8|confirmed',
        ]);

        $imagenNombre = $usuario->imagen;

        if ($request->hasFile('imagen')) {
            // Eliminar la imagen anterior si existe
            $oldPath = public_path('images/users/' . $usuario->imagen);
            if ($usuario->imagen && file_exists($oldPath)) {
                unlink($oldPath);
            }

            $imagenNombre = uniqid() . '.' . $request->imagen->extension();
            $request->imagen->move(public_path('images/users'), $imagenNombre);
        }

        $data = [
            'name' => $validated['name'],
            'email' => $validated['email'],
            'imagen' => $imagenNombre,
            'estado' => $request->input('estado', 'inactiva'),
        ];

        if (!empty($validated['password'])) {
            $data['password'] = Hash::make($validated['password']);
        }

        $usuario->update($data);

        return redirect()->route('usuarios.index')->with('success', 'Usuario actualizado correctamente.');
    }

    public function destroy(User $usuario)
    {
        // Eliminar la imagen si existe
        if ($usuario->imagen) {
            $path = public_path('images/users/' . $usuario->imagen);
            if (file_exists($path)) {
                unlink($path);
            }
        }

        $usuario->delete();

        return redirect()->route('usuarios.index')->with('success', 'Usuario eliminado correctamente.');
    }
}
