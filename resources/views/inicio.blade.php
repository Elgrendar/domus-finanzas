@extends('layouts.base')

@section('titulo', 'Inicio - Domus Finanzas')

@section('contenido')
    <main style="padding: 2rem; max-width: 960px; margin: auto;">

        <div class="text-center">
            <h1>Bienvenido a Domus Finanzas <br>{{ Auth::user()->name }}</h1>
            <p>Gestiona tus finanzas de manera sencilla y eficiente.</p>
            <p>Último acceso: {{ now()->format('d/m/Y H:i') }}</p>
        </div>
        <section class="card">
            <h2>Resumen Financiero</h2>
            <ul>
                <li>Total de ingresos este mes: {{ number_format(App\Models\Movimiento::ingresosEsteMes(), 2, ',', '.') }} €
                </li>
                <li>Total de gastos este mes: {{ number_format(App\Models\Movimiento::gastosEsteMes(), 2, ',', '.') }} €
                </li>
                <li>Saldo total: {{ number_format(App\Models\Cuenta::saldoTotal(), 2, ',', '.') }} €</li>
            </ul>
        </section>
        <section class="card mb-4">
            <h2>Últimos 10 Movimientos</h2>
            <ul class="list-group list-group-flush">
                @forelse ($movimientos as $mov)
                    <li
                        class="list-group-item d-flex justify-content-between align-items-center
                 {{ $mov->tipo_movimiento === 'ingreso' ? 'list-group-item-success' : 'list-group-item-danger' }}">
                        <div>
                            <strong>{{ ucfirst($mov->tipo_movimiento) }}:</strong> {{ number_format($mov->importe, 2, ',', '.') }} €
                            <br>
                            <small>{{ $mov->descripcion }}</small>
                        </div>
                        <span class="badge bg-secondary">{{ \Carbon\Carbon::parse($mov->fecha)->format('d/m/Y') }}</span>
                    </li>
                @empty
                    <li class="list-group-item">No hay movimientos recientes.</li>
                @endforelse
            </ul>
        </section>
        <section class="card">
            <h4> ((En construcción)) </h4>
            <h2>Graficos</h2>
            <p>Mostrar distintas graficas de ingresos y gastos</p>
        </section>
        <section class="card">
            <h4> ((En construcción)) </h4>
            <h2>Alertas</h2>
            <p>No olvides pagar tu factura de electricidad antes del 10/05/2025.</p>
            <p>Revisa tu presupuesto mensual para evitar gastos innecesarios.</p>
        </section>
        <section class="card">
            <h4> ((En construcción)) </h4>
            <h2>Próximos Eventos</h2>
            <ul>
                <li>Reunión con el asesor financiero: 05/05/2025</li>
                <li>Fecha límite para presentar la declaración de impuestos: 15/05/2025</li>
            </ul>
        </section>
        <section class="card">
            <h4> ((En construcción)) </h4>
            <h2>Últimas Noticias Financieras</h2>
            <p>La inflación se mantiene estable en un 3,5% anual.</p>
            <p>El mercado de valores muestra señales de recuperación tras la caída del mes pasado.</p>
        </section>
        <section class="card">
            <h4> ((En construcción)) </h4>
            <h2>Consejos Financieros</h2>
            <p>Revisa tus suscripciones mensuales y cancela las que no uses.</p>
            <p>Considera diversificar tus inversiones para reducir riesgos.</p>
        </section>
        <section class="card">
            <h4> ((En construcción)) </h4>
            <h2>Recursos Útiles</h2>
            <ul>
                <li><a href="#">Calculadora de presupuestos</a></li>
                <li><a href="#">Guía de ahorro para principiantes</a></li>
                <li><a href="#">Foro de usuarios de Domus Finanzas</a></li>
            </ul>
        </section>
    </main>


@endsection
