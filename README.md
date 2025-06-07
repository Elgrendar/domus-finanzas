# Domus Finanzas

> Domus Finanzas es una aplicación web desarrollada con Laravel orientada al control de economía doméstica. Es un proyecto **gratuito y sin ánimo de lucro**, creado como práctica de desarrollo, ideal para quienes buscan aprender y gestionar sus finanzas de forma simple y organizada.

Este proyecto está en **fase activa de desarrollo**, y se aceptan con gusto ideas, sugerencias y mejoras. ¡Anímate a probarlo!

---

## 🌟 Características principales

- Panel de control con acceso rápido a categorías, ingresos y gastos.
- CRUD completo de Categorías (tipificadas como "ingreso" o "gasto").
- Estados activos/inactivos para categorías.
- Selector de color y asignación de iconos personalizados.
- Filtro de categorías activas en subcategorías.
- Responsive design con barra lateral adaptativa.
- Mensajes de éxito y validación de formularios.
- Diseño uniforme basado en **Bootstrap**.
- CRUD completo de Establecimientos y Formas de Pago con control de estado.
- CRUD completo de Movimientos con relación a cuentas, formas de pago, categorías y subcategorías.
- **Filtrado dinámico** entre categorías y subcategorías (JS).
- **Autocompletado** de categoría según subcategoría seleccionada.
- Parcial reutilizable de formulario para movimientos.
- JavaScript modularizado.

---

## 🧪 Funcionalidades en desarrollo

- 📄 Vista `show` para detalle completo de movimientos.
- 🔐 Sistema de autenticación y roles (login/logout).
- 🧮 Gestión de cuentas con saldos y cálculo automático.
- 📊 Panel de estadísticas y gráficos.
- 🧾 Generación de informes PDF con DomPDF.
- 🎨 Tema claro/oscuro con switcher en la navegación.

---

## 🔮 Próximas mejoras

- 🔁 Movimientos recurrentes.
- 🏷️ Sistema de etiquetas para categorías.
- 📂 Exportación e importación de datos.
- 🔍 Filtros avanzados por fechas, importes, etc.
- 🌐 Multiusuario con gestión de accesos y seguridad.

---

## 🚀 Instalación local (modo desarrollo)

1. Clona el repositorio:

   ```bash
   git clone https://github.com/Elgrendar/domus-finanzas.git
   cd domus-finanzas
   ```

2. Instala dependencias:

   ```bash
   composer install
   npm install && npm run dev
   ```

3. Configura el entorno:

   ```bash
   cp .env.example .env
   php artisan key:generate
   ```

4. Configura tu base de datos en `.env` y ejecuta migraciones:

   ```bash
   php artisan migrate
   php artisan serve
   ```

---

## 📈 Estado actual

El proyecto ya cuenta con:

- Gestión completa de Categorías, Subcategorías, Establecimientos y Formas de Pago.
- CRUD de Movimientos con enlaces a todos los modelos relacionados.
- Validaciones robustas en formularios.
- Interfaz responsiva moderna.
- Lógica interactiva con JavaScript personalizado para formularios dinámicos.
- Control de estado activo/inactivo para modelos clave.

---

## ✨ Contribuciones

Cualquier sugerencia, corrección o mejora es bienvenida. Puedes abrir un issue para compartir tus ideas o realizar un pull request.

---

## 🔒 Licencia

Este proyecto está licenciado bajo la **Licencia MIT**, con la siguiente condición adicional:

> Cualquier redistribución del código, total o parcial, deberá incluir atribución clara al autor original: **@Elgrendar**.  
> Para más información sobre el autor, visita: [www.rafacampanero.es](https://www.rafacampanero.es)
