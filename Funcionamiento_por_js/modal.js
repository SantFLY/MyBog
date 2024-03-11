// Este archivo maneja la interacción del usuario y actualiza la URL cuando se selecciona una localidad desde el modal.

$(document).ready(function () {
    // Evento click en el botón de la localidad
    $('[data-target="#movedModal"]').on('click', function () {
        // Obtener el atributo data-localidad del botón
        var localidad = $(this).data('localidad');

        // Actualizar la URL con la localidad seleccionada
        history.pushState(null, null, '?localidad=' + localidad);
    });
});
