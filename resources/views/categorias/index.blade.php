@extends('layouts.base')

@section('title', 'Categorías')

@section('contenido')
    <div class="container-fluid py-4">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h4 class="mb-0">Categorías</h4>
            <a href="{{ route('categorias.create') }}" class="btn btn-primary">
                <i class="bi bi-plus-circle"></i> Nueva categoría
            </a>
        </div>

        <div class="card">
            <div class="card-body p-0">
                <table class="table table-hover mb-0">
                    <thead class="table-light">
                        <tr>
                            <th>Nombre</th>
                            <th>Tipo</th>
                            <th>Descripción</th>
                            <th>Icono</th>
                            <th>Color</th>
                            <th>Estado</th>
                            <th class="text-end">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($categorias as $categoria)
                            <tr>
                                <td>{{ $categoria->nombre }}</td>
                                <td>{{ $categoria->tipo_categoria }}</td>
                                <td>{{ $categoria->descripcion }}</td>
                                <td>
                                    @if ($categoria->icono)
                                        <i class="{{ $categoria->icono }} mt-2"></i>
                                    @else
                                        Sin icono
                                    @endif
                                </td>
                                <td>
                                    @if ($categoria->color)
                                        <div class="color-box mt-2" style="width: 20px; height: 20px; background-color: {{ $categoria->color }};"></div>
                                    @else
                                        Sin color
                                    @endif
                                </td>
                                <td>{{ $categoria->estado }}</td>
                                <td class="text-end">
                                    <a href="{{ route('categorias.edit', $categoria) }}" class="btn btn-sm btn-warning">
                                        <i class="bi bi-pencil-square"></i>
                                    </a>
                                    <form action="{{ route('categorias.destroy', $categoria) }}" method="POST"
                                        class="d-inline-block"
                                        onsubmit="return confirm('¿Estás seguro de que deseas eliminar esta categoría?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger">
                                            <i class="bi bi-trash"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="text-center">No hay categorías registradas.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
