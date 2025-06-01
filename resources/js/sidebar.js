document.addEventListener('DOMContentLoaded', () => {
  const sidebar = document.getElementById('sidebarMenu');
  const btnCollapse = document.getElementById('btn-collapse');
  const btnHide = document.getElementById('btn-hide');
  const btnRestore = document.getElementById('btn-restore');
  const toggle = document.getElementById('theme-toggle');
  const body = document.body;

  // ===== Sidebar =====
  // Leer estado guardado o default
  let estado = localStorage.getItem('sidebarEstado') || 'default';

  // Función para aplicar estado en sidebar y actualizar botones
  function aplicarEstado(estado) {
    sidebar.classList.remove('minimized', 'hidden');
    if (estado === 'minimized') {
      sidebar.classList.add('minimized');
    } else if (estado === 'hidden') {
      sidebar.classList.add('hidden');
    }
    actualizarBotones(estado);
    localStorage.setItem('sidebarEstado', estado);
  }

  // Mostrar u ocultar botones según estado
  function actualizarBotones(estado) {
    btnCollapse.style.display = (estado === 'minimized') ? 'none' : 'inline-block';
    btnHide.style.display = (estado === 'hidden') ? 'none' : 'inline-block';
    btnRestore.style.display = (estado === 'default') ? 'none' : 'inline-block';
  }

  // Eventos botones sidebar
  btnCollapse.addEventListener('click', () => aplicarEstado('minimized'));
  btnHide.addEventListener('click', () => aplicarEstado('hidden'));
  btnRestore.addEventListener('click', () => aplicarEstado('default'));

  // Aplicar estado inicial
  aplicarEstado(estado);

  // ===== Tema claro/oscuro =====
  // Leer tema guardado
  const savedTheme = localStorage.getItem('theme') || 'dark';

  function aplicarTema(theme) {
    if (theme === 'light') {
      body.classList.add('light-mode');
      toggle.checked = true;
    } else {
      body.classList.remove('light-mode');
      toggle.checked = false;
    }
  }

  aplicarTema(savedTheme);

  // Evento toggle tema
  toggle.addEventListener('change', () => {
    if (toggle.checked) {
      aplicarTema('light');
      localStorage.setItem('theme', 'light');
    } else {
      aplicarTema('dark');
      localStorage.setItem('theme', 'dark');
    }
  });

  // ===== Tooltips Bootstrap =====
  const tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
  tooltipTriggerList.map(tooltipTriggerEl => new bootstrap.Tooltip(tooltipTriggerEl));
});
