Domus Finanzas

Domus Finanzas es una aplicación web desarrollada con Laravel orientada al control de economía doméstica. Es un proyecto gratuito y sin ánimo de lucro, creado como práctica de desarrollo, ideal para quienes buscan aprender y gestionar sus finanzas de forma simple y organizada.

Este proyecto está en fase activa de desarrollo, y se aceptan con gusto ideas, sugerencias y mejoras. ¡Anímate a probarlo!

🌟 Características principales

Panel de control con acceso rápido a categorías, ingresos y gastos.

CRUD completo de Categorías (tipificadas como "ingreso" o "gasto").

Estados activos/inactivos para categorías.

Selector de color y asignación de iconos personalizados.

Filtro de categorías activas en subcategorías.

Responsive design con barra lateral adaptativa.

Mensajes de éxito y validación de formularios.

Diseño con Bootstrap.

Gestión de cajas y seguimiento de movimientos (en desarrollo).

Generación de informes PDF con DomPDF (en desarrollo).

Tema claro/oscuro con switcher accesible en la barra de navegación (en desarrollo).

Sistema de etiquetas para categorías (futuro).

Exportación e importación de datos (futuro).

Sistema de autenticación (login/logout) (futuro).

🚀 Instalación local (en desarrollo)

Clona el repositorio:

git clone https://github.com/Elgrendar/domus-finanzas.git
cd domus-finanzas

Instala las dependencias:

composer install
npm install && npm run dev

Crea el archivo .env:

cp .env.example .env
php artisan key:generate

Configura tu base de datos en .env y luego ejecuta:

php artisan migrate
php artisan serve

📈 Estado del proyecto

Este proyecto está en etapa de desarrollo. Las funcionalidades principales están siendo implementadas de forma progresiva. Se busca crear una herramienta sencilla, pero potente para la gestión financiera doméstica.

✨ Cualquier sugerencia, corrección o mejora es bienvenida. Puedes abrir un issue para compartir tus ideas.

🔒 Licencia

Este proyecto está licenciado bajo la Licencia MIT con la siguiente condición adicional:

Cualquier redistribución del código, total o parcial, deberá incluir atribución clara al autor original: @Elgrendar. Para más información sobre el autor, visita www.rafacampanero.es.
