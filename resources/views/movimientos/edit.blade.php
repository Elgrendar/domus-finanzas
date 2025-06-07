@extends('layouts.base')

@section('contenido')
    <div class="container py-4">
        <h2 class="mb-4">Editar Movimiento</h2>

        @if ($errors->any())
            <div class="alert alert-danger">
                <strong>Se encontraron errores:</strong>
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('movimientos.update', $movimiento) }}" method="POST">
            @csrf
            @method('PUT')

            @include('movimientos.form', [
                'movimiento' => $movimiento,
                'cuentas' => $cuentas,
                'formasDePago' => $formasDePago,
                'categorias' => $categorias,
                'subcategorias' => $subcategorias,
            ])

            <button type="submit" class="btn btn-primary mt-3">Actualizar</button>
            <a href="{{ route('movimientos.index') }}" class="btn btn-secondary mt-3">Cancelar</a>
        </form>
    </div>
@endsection

@vite(['resources/js/movimientos.js'])
