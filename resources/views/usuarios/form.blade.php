@csrf

<div class="mb-3">
    <label for="name" class="form-label">Nombre</label>
    <input type="text" name="name" id="name" class="form-control" value="{{ old('name', $usuario->name ?? '') }}"
        required>
</div>

<div class="mb-3">
    <label for="email" class="form-label">Correo electrónico</label>
    <input type="email" name="email" id="email" class="form-control"
        value="{{ old('email', $usuario->email ?? '') }}" required>
</div>

<div class="mb-3">
    <label for="estado" class="form-label">Activado</label>
    <input type="checkbox" name="estado" id="estado" class="form-check-input"
        {{ old('estado', $usuario->estado ?? 'activa') === 'activa' ? 'checked' : '' }}>
</div>

<div class="mb-3">
    <label for="imagen" class="form-label">Imagen de perfil</label>
    <input type="file" name="imagen" id="imagen" class="form-control">
    @if (!empty($usuario->imagen))
        <div class="mt-2">
            <img src="{{ asset('images/users/' . $usuario->imagen) }}" alt="{{ $usuario->name }}" class="rounded-circle"
                style="width: 80px; height: 80px; object-fit: cover;">
        </div>
    @endif
</div>

<div class="mb-3">
    <label for="password" class="form-label">Contraseña
        {{ isset($usuario) ? '(dejar en blanco para no cambiarla)' : '' }}</label>
    <input type="password" name="password" id="password" class="form-control" {{ isset($usuario) ? '' : 'required' }}>
</div>
<div class="mb-3">
    <label for="password_confirmation" class="form-label">Confirmar Contraseña
        {{ isset($usuario) ? '(dejar en blanco para no cambiarla)' : '' }}</label>
    <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" {{ isset($usuario) ? '' : 'required' }}>
</div>
