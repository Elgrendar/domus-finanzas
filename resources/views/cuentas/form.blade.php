<div class="row g-3">
    <div class="col-md-6">
        <label class="form-label">Nombre</label>
        <input type="text" name="nombre" value="{{ old('nombre', $cuenta->nombre ?? '') }}" class="form-control" required>
    </div>
    <div class="col-md-6">
        <label class="form-label">Tipo de Cuenta</label>
        <input type="text" name="tipo_cuenta" value="{{ old('tipo_cuenta', $cuenta->tipo_cuenta ?? '') }}" class="form-control" required>
    </div>
    <div class="col-md-4">
        <label class="form-label">Saldo Inicial</label>
        <input type="number" step="0.01" name="saldo_inicial" value="{{ old('saldo_inicial', $cuenta->saldo_inicial ?? '') }}" class="form-control">
    </div>
    <div class="col-md-4">
        <label class="form-label">Saldo Actual</label>
        <input type="number" step="0.01" name="saldo_actual" value="{{ old('saldo_actual', $cuenta->saldo_actual ?? '') }}" class="form-control">
    </div>
    <div class="col-md-4">
        <label class="form-label">Moneda</label>
        <input type="text" name="moneda" value="{{ old('moneda', $cuenta->moneda ?? '') }}" class="form-control">
    </div>
    <div class="col-md-6">
        <label class="form-label">Fecha de Apertura</label>
        <input type="date" name="fecha_apertura" value="{{ old('fecha_apertura', $cuenta->fecha_apertura ?? '') }}" class="form-control">
    </div>
    <div class="col-md-6">
        <label class="form-label">Banco</label>
        <input type="text" name="banco" value="{{ old('banco', $cuenta->banco ?? '') }}" class="form-control">
    </div>
    <div class="col-12">
        <label class="form-label">Número de Cuenta</label>
        <input type="text" name="numero_cuenta" value="{{ old('numero_cuenta', $cuenta->numero_cuenta ?? '') }}" class="form-control">
    </div>
    <div class="col-12">
        <label class="form-label">Descripción</label>
        <textarea name="descripcion" class="form-control">{{ old('descripcion', $cuenta->descripcion ?? '') }}</textarea>
    </div>
    <div class="col-12">
        <div class="form-check">
            <input class="form-check-input" type="checkbox" name="estado" value="activo" id="estado" {{ old('estado', $cuenta->estado ?? '') === 'activo' ? 'checked' : '' }}>
            <label class="form-check-label" for="estado">Cuenta activa</label>
        </div>
    </div>
    <div class="col-12">
        <button type="submit" class="btn btn-success">Guardar</button>
        <a href="{{ route('cuentas.index') }}" class="btn btn-secondary">Cancelar</a>
    </div>
</div>
