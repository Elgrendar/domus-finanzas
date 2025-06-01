<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8" />
    <title>Domus @yield('title')</title>
    @vite(['resources/js/app.js', 'resources/css/app.css'])
</head>

<body>
    <nav class="navbar fixed-top navbar-expand-lg">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Domus Finanzas</a>

            <!-- Switch tema claro/oscuro -->
            <div class="theme-switcher">
                <label class="switch" for="theme-toggle">
                    <input type="checkbox" id="theme-toggle" />
                    <span class="slider"></span>
                    <span class="theme-icons" aria-hidden="true">🌙☀️</span>
                </label>
            </div>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown"
                aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse justify-content-end" id="navbarNavDropdown">
                <ul class="navbar-nav">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="usuarioDropdown" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            Usuario
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="usuarioDropdown">
                            <li><a class="dropdown-item" href="#">Configuración</a></li>
                            <li><a class="dropdown-item" href="#">Login</a></li>
                            <li><a class="dropdown-item" href="#">Logout</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="sidebar" id="sidebarMenu">
        <nav class="nav flex-column pt-3">
            <a href="{{ route('categorias.index') }}"
                class="nav-link {{ request()->routeIs('categorias.index') ? 'active' : '' }}" data-bs-toggle="tooltip"
                title="Categorías">
                <i class="bi bi-list-ul"></i> <span class="text">Categorías</span>
            </a>
            <a href="{{ route('subcategorias.index') }}"
                class="nav-link {{ request()->routeIs('subcategorias.index') ? 'active' : '' }}"
                data-bs-toggle="tooltip" title="Subcategorías">
                <i class="bi bi-tags"></i> <span class="text">Subcategorías</span>
            </a>
            <a href="{{ route('cuentas.index') }}"
                class="nav-link {{ request()->routeIs('cuentas.index') ? 'active' : '' }}" data-bs-toggle="tooltip"
                title="Cuentas">
                <i class="bi bi-wallet2"></i> <span class="text">Cuentas</span>
            </a>
            <a href="{{ route('establecimientos.index') }}"
                class="nav-link {{ request()->routeIs('establecimientos.index') ? 'active' : '' }}"
                data-bs-toggle="tooltip" title="Establecimientos">
                <i class="bi bi-building"></i> <span class="text">Establecimientos</span>
            </a>
            <a href="{{ route('formasdepago.index') }}"
                class="nav-link {{ request()->routeIs('formasdepago.index') ? 'active' : '' }}" data-bs-toggle="tooltip"
                title="Formas de Pago">
                <i class="bi bi-credit-card"></i> <span class="text">Formas de Pago</span>
            </a>
            <a href="{{ route('movimientos.index') }}"
                class="nav-link {{ request()->routeIs('movimientos.index') ? 'active' : '' }}" data-bs-toggle="tooltip"
                title="Movimientos">
                <i class="bi bi-arrow-left-right"></i> <span class="text">Movimientos</span>
            </a>
            <a href="{{ route('usuarios.index') }}"
                class="nav-link {{ request()->routeIs('usuarios.index') ? 'active' : '' }}" data-bs-toggle="tooltip"
                title="Usuarios">
                <i class="bi bi-people"></i> <span class="text">Usuarios</span>
            </a>

            <div class="sidebar-controls mt-auto">
                <button id="btn-collapse" type="button" data-bs-toggle="tooltip" title="Minimizar">
                    <i class="bi bi-chevron-double-left"></i>
                </button>
                <button id="btn-hide" type="button" data-bs-toggle="tooltip" title="Ocultar">
                    <i class="bi bi-x-lg"></i>
                </button>
                <button id="btn-restore" type="button" data-bs-toggle="tooltip" title="Restaurar">
                    <i class="bi bi-arrow-clockwise"></i>
                </button>
            </div>
        </nav>
    </div>

    <main class="main-content pt-5">
        <div class="container-fluid">
            @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show m-5" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Cerrar"></button>
                </div>
            @endif
            @yield('contenido')
        </div>
    </main>

    <footer class="footer text-center py-3 mt-auto w-100">
        &copy; 2025 Domus Finanzas
    </footer>

    @vite(['resources/js/sidebar.js', 'resources/css/sidebar.css'])
</body>

</html>
