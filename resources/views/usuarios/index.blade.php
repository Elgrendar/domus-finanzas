@extends('layouts.base')

@section('title', 'Usuarios')

@section('contenido')
    <div class="container-fluid py-4">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h4 class="mb-0">Usuarios</h4>
            <a href="{{ route('usuarios.create') }}" class="btn btn-primary">
                <i class="bi bi-plus-circle"></i> Nuevo usuario
            </a>
        </div>
        <div class="card">
            <div class="card-body p-0">
                <table class="table table-hover mb-0">
                    <thead class="table-light">
                        <tr>
                            <th>Nombre</th>
                            <th>Email</th>
                            <th class="text-center">Imagen</th>
                            <th class="text-center">Estado</th>
                            <th class="text-end">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($usuarios as $usuario)
                            <tr>
                                <td>{{ $usuario->name }}</td>
                                <td>{{ $usuario->email }}</td>
                                <td class="text-center align-middle">
                                    @if($usuario->imagen!==null)
                                        <img src="{{ asset('images/users/' . $usuario->imagen) }}"
                                        alt="{{ $usuario->name }}" class="rounded-circle mx-auto d-block" style="width: 40px; height: 40px; object-fit: cover;">
                                    @else
                                        Sin imagen
                                    @endif
                                </td>
                                <td class="text-center align-middle">
                                    <span class="badge bg-{{ $usuario->estado === 'activa' ? 'success' : 'secondary' }}">
                                        {{ ucfirst($usuario->estado) }}
                                    </span>
                                </td>
                                <td class="text-end">
                                    <a href="{{ route('usuarios.edit', $usuario) }}" class="btn btn-sm btn-warning">
                                        <i class="bi bi-pencil-square"></i>
                                    </a>
                                    <form action="{{ route('usuarios.destroy', $usuario) }}" method="POST"
                                        style="display: inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger"
                                            onclick="return confirm('¿Estás seguro de eliminar este usuario?')">
                                            <i class="bi bi-trash"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="text-center">No hay usuarios registrados.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
