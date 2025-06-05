@extends('layouts.base')

@section('contenido')
<div class="container py-4">
    <h2 class="mb-4">Nuevo Establecimiento</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Se encontraron algunos errores:</strong>
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('establecimientos.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="nombre" class="form-label">Nombre *</label>
            <input type="text" name="nombre" id="nombre" value="{{ old('nombre') }}" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="direccion" class="form-label">Dirección</label>
            <input type="text" name="direccion" id="direccion" value="{{ old('direccion') }}" class="form-control">
        </div>

        <div class="mb-3">
            <label for="telefono" class="form-label">Teléfono</label>
            <input type="text" name="telefono" id="telefono" value="{{ old('telefono') }}" class="form-control" maxlength="9">
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" name="email" id="email" value="{{ old('email') }}" class="form-control">
        </div>

        <div class="mb-3">
            <label for="tipo_establecimiento" class="form-label">Tipo de Establecimiento</label>
            <input type="text" name="tipo_establecimiento" id="tipo_establecimiento" value="{{ old('tipo_establecimiento') }}" class="form-control">
        </div>

        <div class="mb-3">
            <label for="descripcion" class="form-label">Descripción</label>
            <textarea name="descripcion" id="descripcion" rows="3" class="form-control">{{ old('descripcion') }}</textarea>
        </div>

        <div class="form-check form-switch mb-4">
            <input class="form-check-input" type="checkbox" id="estado" name="estado" {{ old('estado', true) ? 'checked' : '' }}>
            <label class="form-check-label" for="estado">Activo</label>
        </div>

        <div class="d-flex justify-content-between">
            <a href="{{ route('establecimientos.index') }}" class="btn btn-secondary">Cancelar</a>
            <button type="submit" class="btn btn-success">Guardar</button>
        </div>
    </form>
</div>
@endsection
