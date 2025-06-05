@extends('layouts.base')

@section('contenido')
<div class="container mt-4">
    <h2>Nueva Cuenta</h2>
    <form action="{{ route('cuentas.store') }}" method="POST">
        @csrf
        @include('cuentas.form')
    </form>
</div>
@endsection
