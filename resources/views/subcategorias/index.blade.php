@extends('layouts.base')

@section('title', 'Subcategorías')

@section('contenido')
    <div class="container-fluid py-4">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h4 class="mb-0">Subcategorías</h4>
            <a href="{{ route('subcategorias.create') }}" class="btn btn-primary">
                <i class="bi bi-plus-circle"></i> Nueva subcategoría
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
                            <th>Pertenece a:</th>
                            <th>Icono</th>
                            <th>Color</th>
                            <th>Estado</th>
                            <th class="text-end">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($subcategorias as $subcategoria)
                            <tr>
                                <td>{{ $subcategoria->nombre }}</td>
                                <td>{{ $subcategoria->tipo_subcategoria }}</td>
                                <td>{{ $subcategoria->descripcion }}</td>
                                <td>{{ $subcategoria->categoria->nombre }}</td>
                                <td>
                                    @if ($subcategoria->icono)
                                        <i class="{{ $subcategoria->icono }} mt-2"></i>
                                    @else
                                        Sin icono
                                    @endif
                                </td>
                                <td>
                                    @if ($subcategoria->color)
                                        <div class="color-box mt-2"
                                            style="width: 20px; height: 20px; background-color: {{ $subcategoria->color }};">
                                        </div>
                                    @else
                                        Sin color
                                    @endif
                                </td>
                                <td>
                                    <span class="badge bg-{{ $subcategoria->estado === 'activa' ? 'success' : 'secondary' }}">
                                        {{ ucfirst($subcategoria->estado) }}
                                    </span>
                                </td>
                                <td class="text-end">
                                    <a href="{{ route('subcategorias.edit', $subcategoria) }}"
                                        class="btn btn-sm btn-warning">
                                        <i class="bi bi-pencil-square"></i>
                                    </a>
                                    <form action="{{ route('subcategorias.destroy', $subcategoria) }}" method="POST"
                                        class="d-inline-block"
                                        onsubmit="return confirm('¿Estás seguro de que deseas eliminar esta subcategoría?')">
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
