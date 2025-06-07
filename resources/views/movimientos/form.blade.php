<div class="row g-3">
    <div class="col-md-6">
        <label for="fecha" class="form-label">Fecha</label>
        <input type="date" name="fecha" id="fecha" class="form-control"
            value="{{ old('fecha', $movimiento->fecha ?? '') }}">
    </div>

    <div class="col-md-6">
        <label for="tipo_movimiento" class="form-label">Tipo de Movimiento</label>
        <select name="tipo_movimiento" id="tipo_movimiento" class="form-select">
            <option value="">Seleccione...</option>
            <option value="ingreso"
                {{ old('tipo_movimiento', $movimiento->tipo_movimiento ?? '') == 'ingreso' ? 'selected' : '' }}>Ingreso
            </option>
            <option value="gasto"
                {{ old('tipo_movimiento', $movimiento->tipo_movimiento ?? '') == 'gasto' ? 'selected' : '' }}>Gasto
            </option>
        </select>
    </div>

    <div class="col-md-12">
        <label for="descripcion" class="form-label">Descripción</label>
        <textarea name="descripcion" id="descripcion" class="form-control" rows="2">{{ old('descripcion', $movimiento->descripcion ?? '') }}</textarea>
    </div>

    <div class="col-md-6">
        <label for="importe" class="form-label">Importe</label>
        <input type="number" name="importe" id="importe" class="form-control" step="0.01"
            value="{{ old('importe', $movimiento->importe ?? '') }}">
    </div>

    <div class="col-md-6">
        <label for="cuenta_id" class="form-label">Cuenta</label>
        <select name="cuenta_id" id="cuenta_id" class="form-select">
            <option value="">Seleccione...</option>
            @foreach ($cuentas as $cuenta)
                <option value="{{ $cuenta->id }}"
                    {{ old('cuenta_id', $movimiento->cuenta_id ?? '') == $cuenta->id ? 'selected' : '' }}>
                    {{ $cuenta->nombre }}
                </option>
            @endforeach
        </select>
    </div>

    <div class="col-md-6">
        <label for="forma_pago_id" class="form-label">Forma de Pago</label>
        <select name="forma_pago_id" id="forma_pago_id" class="form-select">
            <option value="">Seleccione...</option>
            @foreach ($formasDePago as $forma)
                <option value="{{ $forma->id }}"
                    {{ old('forma_pago_id', $movimiento->forma_pago_id ?? '') == $forma->id ? 'selected' : '' }}>
                    {{ $forma->nombre }}
                </option>
            @endforeach
        </select>
    </div>

    <div class="col-md-6">
        <label for="referencia" class="form-label">Referencia</label>
        <input type="text" name="referencia" id="referencia" class="form-control"
            value="{{ old('referencia', $movimiento->referencia ?? '') }}">
    </div>

    <div class="col-md-6">
        <label for="categoria" class="form-label">Categoría</label>
        <select name="categoria" id="categoria" class="form-select">
            <option value="">Todas</option>
            @foreach ($categorias as $cat)
                <option value="{{ $cat->id }}"
                    {{ old('categoria', $movimiento->categoria ?? '') == $cat->id ? 'selected' : '' }}>
                    {{ $cat->nombre }}
                </option>
            @endforeach
        </select>
    </div>

    <div class="col-md-6">
        <label for="subcategoria" class="form-label">Subcategoría</label>
        <select name="subcategoria" id="subcategoria" class="form-select">
            <option value="">Todas</option>
            @foreach ($subcategorias as $sub)
                <option data-categoria="{{ $sub->categoria_id }}" value="{{ $sub->id }}"
                    {{ old('subcategoria', $movimiento->subcategoria ?? '') == $sub->id ? 'selected' : '' }}>
                    {{ $sub->nombre }}
                </option>
            @endforeach
        </select>
    </div>


    <div class="col-md-6">
        <div class="form-check mt-4">
            <input type="checkbox" name="estado" id="estado" class="form-check-input"
                {{ old('estado', $movimiento->estado ?? '') === 'completado' ? 'checked' : '' }}>
            <label class="form-check-label" for="estado">Completado</label>
        </div>
    </div>
</div>
