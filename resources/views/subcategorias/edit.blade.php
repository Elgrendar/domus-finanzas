@extends('layouts.base')

@section('title', 'Nueva Subcategoría')

@section('contenido')
    <div class="container-fluid py-4">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h4 class="mb-0">Editar subcategoría</h4>
            <a href="{{ route('subcategorias.index') }}" class="btn btn-secondary">
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
                <form action="{{ route('subcategorias.update', $subcategoria->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label for='estado' class="form-label">Activo</label>
                        <input type="checkbox" name="estado" id="estado" class="form-check-input me-2"
                             {{ old('estado', $subcategoria->estado ?? 'activo') ? 'checked' : '' }}>
                        <label for="nombre" class="form-label">Nombre</label>
                        <input type="text" name="nombre" id="nombre" class="form-control" value="{{ old('nombre', $subcategoria->nombre) }}"
                            required>
                    </div>
                    <div class="mb-3">
                        <label for="tipo_subcategoria" class="form-label">Tipo de subcategoría</label>
                        <select name="tipo_subcategoria" id="tipo_subcategoria" class="form-select" required>
                            <option value="" disabled selected>Seleccione un tipo</option>
                            <option value="ingreso" {{ old('tipo_subcategoria', $subcategoria->tipo_subcategoria) == 'ingreso' ? 'selected' : '' }}>Ingreso
                            </option>
                            <option value="gasto" {{ old('tipo_subcategoria', $subcategoria->tipo_subcategoria) == 'gasto' ? 'selected' : '' }}>Gasto
                            </option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="categoria_id" class="form-label mt-3">Categoría</label>
                        <select name="categoria_id" id="categoria_id" class="form-select" required>
                            <option value="" disabled selected>Seleccione una categoría</option>
                            @foreach ($categorias as $categoria)
                                <option value="{{ $categoria->id }}"
                                    {{ old('categoria_id', $subcategoria->categoria_id) == $categoria->id ? 'selected' : '' }}>
                                    {{ $categoria->nombre }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="icono" class="form-label">Icono</label>
                        <input type="text" name="icono" id="icono" class="form-control" value="{{ old('icono', $subcategoria->icono) }}"
                            placeholder="Ejemplo: bi bi-wallet2">
                    </div>
                    <div class="mb-3">
                        <label for="color" class="form-label">Color</label>
                        <input type="color" name="color" id="color" class="form-control"
                            value="{{ old('color', $subcategoria->color) }}">
                    </div>
                    <div class="mb-3">
                        <label for="descripcion" class="form-label">Descripción</label>
                        <textarea name="descripcion" id="descripcion" class="form-control" rows="3">{{ old('descripcion', $subcategoria->descripcion) }}</textarea>
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
