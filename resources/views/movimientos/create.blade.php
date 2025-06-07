@extends('layouts.base')

@section('contenido')
    <div class="container py-4">
        <h2 class="mb-4">Nuevo Movimiento</h2>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('movimientos.store') }}" method="POST">
            @csrf

            @include('movimientos.form', [
                'movimiento' => null,
                'cuentas' => $cuentas,
                'formasDePago' => $formasDePago,
                'categorias' => $categorias,
                'subcategorias' => $subcategorias,
            ])

            <button type="submit" class="btn btn-primary mt-3">Guardar Movimiento</button>
        </form>
    </div>
@endsection

@vite(['resources/js/movimientos.js'])
