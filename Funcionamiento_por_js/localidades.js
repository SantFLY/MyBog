$(document).ready(function () {
    const localidades = $('.localidad');
    const numLocalidades = localidades.length;
    const localidadesPorPagina = 3;
    let paginaActual = 0;

    function mostrarLocalidades() {
        localidades.removeClass('visible');
        for (let i = paginaActual * localidadesPorPagina; i < (paginaActual + 1) * localidadesPorPagina; i++) {
            localidades.eq(i).addClass('visible');
        }
    }

    $('#prev-arrow').click(function () {
        if (paginaActual > 0) {
            paginaActual--;
            mostrarLocalidades();
        }
    });

    $('#next-arrow').click(function () {
        if (paginaActual < Math.ceil(numLocalidades / localidadesPorPagina) - 1) {
            paginaActual++;
            mostrarLocalidades();
        }
    });

    mostrarLocalidades();
});