@extends('layouts.base')

@section('title', 'Nueva Categoría')

@section('contenido')
    <div class="container-fluid py-4">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h4 class="mb-0">Crear nueva categoría</h4>
            <a href="{{ route('categorias.index') }}" class="btn btn-secondary">
                <i class="bi bi-arrow-left"></i> Volver
            </a>
        </div>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="card">
            <div class="card-body">
                <form action="{{ route('categorias.store') }}" method="POST">
                    @csrf

                    <div class="mb-3">
                        <label for='estado' class="form-label">Activo</label>
                        <input type="checkbox" name="estado" id="estado" class="form-check-input me-2"
                            {{ old('estado', $categoria->estado ?? 'activo') ? 'checked' : '' }}>
                        <label for="nombre" class="form-label">Nombre</label>
                        <input type="text" name="nombre" id="nombre" class="form-control" value="{{ old('nombre') }}"
                            required>
                    </div>
                    <div class="mb-3">
                        <label for="tipo_categoria" class="form-label">Tipo de categoría</label>
                        <select name="tipo_categoria" id="tipo_categoria" class="form-select" required>
                            <option value="" disabled selected>Seleccione un tipo</option>
                            <option value="ingreso" {{ old('tipo_categoria') == 'ingreso' ? 'selected' : '' }}>Ingreso
                            </option>
                            <option value="gasto" {{ old('tipo_categoria') == 'gasto' ? 'selected' : '' }}>Gasto</option>
                        </select>
                        <div class="mb-3">
                            <label for="icono" class="form-label">Icono</label>
                            <input type="text" name="icono" id="icono" class="form-control"
                                value="{{ old('icono') }}" placeholder="Ejemplo: bi bi-wallet2">
                        </div>
                        <div class="mb-3">
                            <label for="color" class="form-label">Color</label>
                            <input type="color" name="color" id="color" class="form-control"
                                value="{{ old('color') }}">
                        </div>
                        <div class="mb-3">
                            <label for="descripcion" class="form-label">Descripción</label>
                            <textarea name="descripcion" id="descripcion" class="form-control" rows="3">{{ old('descripcion') }}</textarea>
                        </div>

                        <div class="d-flex justify-content-end">
                            <button type="submit" class="btn btn-primary">
                                <i class="bi bi-save"></i> Guardar
                            </button>
                        </div>
                </form>
            </div>
        </div>
    </div>
@endsection
