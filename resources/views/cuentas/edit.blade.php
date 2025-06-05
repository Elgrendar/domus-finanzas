@extends('layouts.base')

@section('contenido')
<div class="container mt-4">
    <h2>Editar Cuenta</h2>
    <form action="{{ route('cuentas.update', $cuenta->id) }}" method="POST">
        @csrf
        @method('PUT')
        @include('cuentas.form', ['cuenta' => $cuenta])
    </form>
</div>
@endsection
