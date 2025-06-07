@extends('layouts.base')

@section('contenido')
    <div class="container py-4">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h2 class="mb-0">Movimientos</h2>
            <a href="{{ route('movimientos.create') }}" class="btn btn-success">
                <i class="bi bi-plus-circle"></i> Nuevo Movimiento
            </a>
        </div>

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <div class="table-responsive">
            <table class="table table-striped align-middle">
                <thead>
                    <tr>
                        <th>Fecha</th>
                        <th>Tipo</th>
                        <th>Descripción</th>
                        <th>Importe</th>
                        <th>Cuenta</th>
                        <th>Forma de Pago</th>
                        <th>Estado</th>
                        <th class="text-end">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($movimientos as $movimiento)
                        <tr>
                            <td>{{ \Carbon\Carbon::parse($movimiento->fecha)->format('d/m/Y') }}</td>
                            <td>{{ ucfirst($movimiento->tipo_movimiento) }}</td>
                            <td>{{ $movimiento->descripcion }}</td>
                            <td>{{ number_format($movimiento->importe, 2) }} €</td>
                            <td>{{ $movimiento->cuenta->nombre ?? '-' }}</td>
                            <td>{{ $movimiento->formaPago->nombre ?? '-' }}</td>
                            <td>
                                <span class="badge bg-{{ $movimiento->estado === 'completado' ? 'success' : 'secondary' }}">
                                    {{ ucfirst($movimiento->estado) }}
                                </span>
                            </td>
                            <td class="text-end">
                                <a href="{{ route('movimientos.edit', $movimiento->id) }}" class="btn btn-sm btn-warning">
                                    <i class="bi bi-pencil-square"></i>
                                </a>
                                <form action="{{ route('movimientos.destroy', $movimiento->id) }}" method="POST"
                                    class="d-inline"
                                    onsubmit="return confirm('¿Estás seguro de que deseas eliminar este movimiento?')">
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
                            <td colspan="8" class="text-center">No hay movimientos registrados.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
