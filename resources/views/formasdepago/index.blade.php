@extends('layouts.base')

@section('contenido')
<div class="container py-4">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2>Listado de Formas de Pago</h2>
        <a href="{{ route('formasdepago.create') }}" class="btn btn-primary">Nueva Forma de Pago</a>
    </div>
    <div class="table-responsive">
        <table class="table table-hover">
            <thead class="table-light">
                <tr>
                    <th>Nombre</th>
                    <th>Tipo</th>
                    <th>Descripción</th>
                    <th>Estado</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($formasdepago as $forma)
                <tr>
                    <td>{{ $forma->nombre }}</td>
                    <td>{{ $forma->tipo_pago }}</td>
                    <td>{{ $forma->descripcion }}</td>
                    <td>
                        <span class="badge bg-{{ $forma->estado === 'activa' ? 'success' : 'secondary' }}">
                            {{ ucfirst($forma->estado) }}
                        </span>
                    </td>
                    <td>
                        <a href="{{ route('formasdepago.edit', $forma->id) }}" class="btn btn-sm btn-warning">
                            <i class="bi bi-pencil-square"></i>
                        </a>
                        <form action="{{ route('formasdepago.destroy', $forma->id) }}" method="POST" class="d-inline-block" onsubmit="return confirm('¿Deseas eliminar esta forma de pago?')">
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
