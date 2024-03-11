$(document).ready(function () {
    // Agrega un evento que se active cuando se muestre el modal
    $('#userModal').on('show.bs.modal', function () {
        // Realiza una solicitud AJAX para obtener los datos del usuario
        $.ajax({
            url: './modales_usuario.php', // Reemplaza con la URL correcta
            type: 'GET',
            dataType: 'json',
            success: function (data) {
                // Llena los elementos HTML con los datos del usuario
                $('#nombreUsuario').text(data.Nombres);
                $('#apellidoUsuario').text(data.Apellidos);
                $('#correoUsuario').text(data.Email);
            },
            error: function () {
                alert('Error al obtener los datos del usuario.');
            }
        });
    });
});



