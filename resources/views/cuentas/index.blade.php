resources/views/cuentas/index.blade.php

@extends('layouts.base')

@section('contenido')
<div class="container mt-4">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2>Listado de Cuentas</h2>
        <a href="{{ route('cuentas.create') }}" class="btn btn-primary">Nueva Cuenta</a>
    </div>

    <div class="table-responsive">
        <table class="table table-bordered table-hover">
            <thead class="table-dark">
                <tr>
                    <th>Nombre</th>
                    <th>Tipo</th>
                    <th>Saldo Inicial</th>
                    <th>Estado</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @forelse($cuentas as $cuenta)
                <tr>
                    <td>{{ $cuenta->nombre }}</td>
                    <td>{{ $cuenta->tipo_cuenta }}</td>
                    <td>{{ number_format($cuenta->saldo_inicial, 2) }} {{ $cuenta->moneda }}</td>
                    <td>
                        <span class="badge bg-{{ $cuenta->estado === 'activa' ? 'success' : 'secondary' }}">
                            {{ ucfirst($cuenta->estado) }}
                        </span>
                    </td>
                    <td>
                        <a href="{{ route('cuentas.edit', $cuenta->id) }}" class="btn btn-sm btn-warning">
                            <i class="bi bi-pencil-square"></i>
                        </a>
                        <form action="{{ route('cuentas.destroy', $cuenta->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('¿Deseas eliminar esta cuenta?')">
                                <i class="bi bi-trash"></i>
                            </button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" class="text-center">No hay cuentas registradas.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
