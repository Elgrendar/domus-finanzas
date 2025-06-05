@extends('layouts.base')

@section('contenido')
<div class="container py-4">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2>Listado de Establecimientos</h2>
        <a href="{{ route('establecimientos.create') }}" class="btn btn-primary">Nuevo Establecimiento</a>
    </div>
    <div class="table-responsive">
        <table class="table table-hover">
            <thead class="table-light">
                <tr>
                    <th>Nombre</th>
                    <th>Dirección</th>
                    <th>Teléfono</th>
                    <th>Email</th>
                    <th>Tipo</th>
                    <th>Estado</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($establecimientos as $establecimiento)
                <tr>
                    <td>{{ $establecimiento->nombre }}</td>
                    <td>{{ $establecimiento->direccion }}</td>
                    <td>{{ $establecimiento->telefono }}</td>
                    <td>{{ $establecimiento->email }}</td>
                    <td>{{ $establecimiento->tipo_establecimiento }}</td>
                    <td>
                        <span class="badge bg-{{ $establecimiento->estado == 'activa' ? 'success' : 'secondary' }}">
                            {{ ucfirst($establecimiento->estado) }}
                        </span>
                    </td>
                    <td>
                        <a href="{{ route('establecimientos.edit', $establecimiento) }}" class="btn btn-sm btn-warning">
                            <i class="bi bi-pencil-square"></i>
                        </a>
                        <form action="{{ route('establecimientos.destroy', $establecimiento) }}" method="POST" class="d-inline-block" onsubmit="return confirm('¿Deseas eliminar este establecimiento?')">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-sm btn-danger">
                                <i class="bi bi-trash"></i>
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
