document.addEventListener('DOMContentLoaded', function () {
    const categoriaSelect = document.getElementById('categoria');
    const subcategoriaSelect = document.getElementById('subcategoria');

    // Guardamos una copia de las opciones originales
    const subcategoriasOriginales = Array.from(subcategoriaSelect.options).slice();

    function filtrarSubcategorias() {
        const categoriaId = categoriaSelect.value;

        // Limpiar subcategorías
        subcategoriaSelect.innerHTML = '';

        // Filtrar
        const opcionesFiltradas = categoriaId === ''
            ? subcategoriasOriginales
            : subcategoriasOriginales.filter(opcion =>
                opcion.value === '' || opcion.dataset.categoria === categoriaId
            );

        // Renderizar
        opcionesFiltradas.forEach(opcion =>
            subcategoriaSelect.appendChild(opcion.cloneNode(true))
        );
    }

    function autocompletarCategoria() {
        const subSeleccionada = subcategoriaSelect.selectedOptions[0];
        const categoriaId = subSeleccionada?.dataset?.categoria;

        if (categoriaId) {
            categoriaSelect.value = categoriaId;
            filtrarSubcategorias();
            subcategoriaSelect.value = subSeleccionada.value;
        }
    }

    categoriaSelect.addEventListener('change', filtrarSubcategorias);
    subcategoriaSelect.addEventListener('change', autocompletarCategoria);

    // Al cargar, filtrar según valor actual
    filtrarSubcategorias();
});
