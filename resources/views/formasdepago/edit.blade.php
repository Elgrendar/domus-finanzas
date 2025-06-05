@extends('layouts.base')

@section('contenido')
<div class="container py-4">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2>Editar Forma de Pago</h2>
        <a href="{{ route('formasdepago.index') }}" class="btn btn-secondary">Volver al listado</a>
    </div>

    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>¡Ups!</strong> Hay algunos errores en el formulario.<br><br>
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('formasdepago.update', $formasdepago->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="nombre" class="form-label">Nombre</label>
            <input type="text" name="nombre" value="{{ old('nombre', $formasdepago->nombre) }}" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="tipo_pago" class="form-label">Tipo de Pago</label>
            <input type="text" name="tipo_pago" value="{{ old('tipo_pago', $formasdepago->tipo_pago) }}" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="descripcion" class="form-label">Descripción</label>
            <textarea name="descripcion" class="form-control" rows="3" required>{{ old('descripcion', $formasdepago->descripcion) }}</textarea>
        </div>

        <div class="form-check form-switch mb-4">
            <input class="form-check-input" type="checkbox" name="estado" id="estado" {{ $formasdepago->estado == 'activo' ? 'checked' : '' }}>
            <label class="form-check-label" for="estado">Activo</label>
        </div>

        <button type="submit" class="btn btn-primary">Actualizar</button>
    </form>
</div>
@endsection
