@extends('layouts.base')

@section('contenido')
  <main style="padding: 2rem; max-width: 960px; margin: auto;">
    <h1>Página de Inicio</h1>
    <section class="card">
      <h2>Bienvenido a Domus Finanzas</h2>
      <p>Gestiona tus finanzas de manera sencilla y eficiente.</p>
      <p>Último acceso: {{ now()->format('d/m/Y H:i') }}</p>
    </section>
    <section class="card">
      <h2>Estadísticas Rápidas</h2>
      <ul>
        <li>Total de ingresos este mes: 1.500,00 €</li>
        <li>Total de gastos este mes: 345,75 €</li>
        <li>Saldo total: 1.245,00 €</li>
      </ul>
    </section>
    <section class="card">
      <h2>Últimos Movimientos</h2>
      <ul>
        <li>Ingreso: 500,00 € - Fecha: 01/05/2025</li>
        <li>Gasto: 50,00 € - Fecha: 02/05/2025</li>
        <li>Ingreso: 200,00 € - Fecha: 03/05/2025</li>
      </ul>
    </section>
    <section class="card">
      <h2>Alertas</h2>
      <p>No olvides pagar tu factura de electricidad antes del 10/05/2025.</p>
      <p>Revisa tu presupuesto mensual para evitar gastos innecesarios.</p>
    </section>
    <section class="card">
      <h2>Próximos Eventos</h2>
      <ul>
        <li>Reunión con el asesor financiero: 05/05/2025</li>
        <li>Fecha límite para presentar la declaración de impuestos: 15/05/2025</li>
      </ul>
    </section>
    <section class="card">
      <h2>Últimas Noticias Financieras</h2>
      <p>La inflación se mantiene estable en un 3,5% anual.</p>
      <p>El mercado de valores muestra señales de recuperación tras la caída del mes pasado.</p>
    </section>
    <section class="card">
      <h2>Consejos Financieros</h2>
      <p>Revisa tus suscripciones mensuales y cancela las que no uses.</p>
      <p>Considera diversificar tus inversiones para reducir riesgos.</p>
    </section>
    <section class="card">
      <h2>Recursos Útiles</h2>
      <ul>
        <li><a href="#">Calculadora de presupuestos</a></li>
        <li><a href="#">Guía de ahorro para principiantes</a></li>
        <li><a href="#">Foro de usuarios de Domus Finanzas</a></li>
      </ul>
    </section>
  </main>


@endsection

