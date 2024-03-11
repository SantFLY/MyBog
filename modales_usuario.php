<?php


if (isset($_SESSION['user_id'])) {
    echo <<<HTML
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" style="transform: translate(0%, 10%);" href="#" id="userDropdown" role="button"
                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <img src="./Imagenes/usuario.png" alt="Imagen de perfil" width="32" height="32"> 
                <span class="user-info-container nombreUsuario" style="padding:10px; color: white;">{$_SESSION['nombres']}</span>
            </a>
            <div class="dropdown-menu" aria-labelledby="userDropdown" style="text-align: center; margin-left: -40px; margin-top:10px;">
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#EditarDatos">Editar Usuario</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="./mis_registros.php">Establecimientos registrados</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#confirmLogoutModal">Cerrar sesión</a>
HTML;

    // Verificar si el rol del usuario es "admin"
    if (isset($_SESSION['rol']) && $_SESSION['rol'] === 'Admin') {
        echo <<<HTML
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="./admin.php">Dashboard Admin</a>
HTML;
    }

    echo <<<HTML
            </div>
        </li>
HTML;
} else {
    echo <<<HTML
        <li class="nav-item">
            <a class="nav-link rojo" id="main" href="./main.php">Ingresar</a>
        </li>
        <li class="nav-item">
            <a class="nav-link amarillo" id="registro" href="./registro.php">Registro</a>
        </li>
HTML;
}
?>

<!-- Modales -->
<div class="modal fade" id="EditarDatos" tabindex="-1" role="dialog" aria-labelledby="userModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="userModalLabel">Mis Datos</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="editForm" method="post" action="php/actualizar.php">
                    <div class="form-group">
                        <label for="editNombre">Nombre:</label>
                        <input type="text" name="nuevoNombre" id="editNombre" class="form-control" autofocus required
                            maxlength="20" pattern="[a-zA-Z\s]+"
                            title="Solo se permiten letras y espacios. Máximo 20 caracteres."
                            value="<?php echo isset($_SESSION['nombres']) ? $_SESSION['nombres'] : ''; ?>">
                    </div>
                    <div class="form-group">
                        <label for="editApellido">Apellido:</label>
                        <input type="text" name="nuevoApellido" id="editApellido" class="form-control" required
                            maxlength="20" pattern="[a-zA-Z\s]+"
                            title="Solo se permiten letras y espacios. Máximo 20 caracteres."
                            value="<?php echo isset($_SESSION['apellidos']) ? $_SESSION['apellidos'] : ''; ?>">
                    </div>
                    <div class="form-group">
                        <label for="editCorreo">Correo:</label>
                        <input type="email" name="nuevoCorreo" id="editCorreo" class="form-control" required
                            maxlength="50" pattern="[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}"
                            title="Ingresa un correo electrónico válido. Máximo 50 caracteres."
                            value="<?php echo isset($_SESSION['email']) ? $_SESSION['email'] : ''; ?>">
                    </div>
                    <div class="form-group">
                        <div class="form-group">
                            <label for="editcontraseña"> Contraseña:</label>
                            <input type="password" name="nuevaContraseña" id="nuevaContraseña" class="form-control"
                                required minlength="8" maxlength="15" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,15}"
                                title="Debe contener al menos una mayúscula, una minúscula y un número. Mínimo 8 y máximo 15 caracteres.">
                        </div>

                    </div>
                    <div class="modal-footer">
                        <a type="button" id="btnEliminarCuenta" class="red mr-auto" data-toggle="modal"
                            data-target="#confirmEliminarModal">Eliminar Cuenta</a>
                        <button type="submit" id="btnGuardarCambios" class="yellow ml-auto">Guardar Cambios</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="confirmEliminarModal" tabindex="-1" role="dialog"
    aria-labelledby="confirmEliminarModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="confirmEliminarModalLabel">Confirmar Eliminar Cuenta</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                ¿Estás seguro de que deseas eliminar tu cuenta? Esta acción no se puede deshacer.
            </div>
            <div class="modal-footer">
                <form method="post" action="php/eliminar.php">
                    <button id="btnConfirmarEliminar" class="red mr-auto">Eliminar Cuenta</button>
                </form>
                <button type="button" class="yellow ml-auto" data-dismiss="modal">Cancelar</button>
            </div>
        </div>
    </div>
</div>


<div class="modal fade" id="confirmLogoutModal" tabindex="-1" role="dialog" aria-labelledby="confirmLogoutModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="confirmLogoutModalLabel">Confirmar cierre de sesión</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                ¿Estás seguro de que quieres cerrar sesión?
            </div>
            <div class="modal-footer">
                <button type="button" class="yellow mr-auto" data-dismiss="modal">Cancelar</button>
                <a class="red ml-auto" href="./php/logout.php">Cerrar sesión</a>
            </div>
        </div>
    </div>
</div>


<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel">Mensaje</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <div class="modal-body">
                Debes estar logeado/registrado para utilizar este servicio.
            </div>
            <div class="modal-footer">
                <button type="button" class="red" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="confirmaEliminarModal" tabindex="-1" role="dialog"
    aria-labelledby="confirmaEliminarModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="confirmaEliminarModalLabel">Confirmar
                    Eliminar Establecimiento</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                ¿Estás seguro de que deseas eliminar tu establecimiento? Esta acción no
                se
                puede deshacer.
            </div>
            <div class="modal-footer">
                <form id="eliminarForm" method="post" action="mis_registros.php">
                    <input type="hidden" id="registroIdInput" name="registro_id" value="">
                    <button id="btnConfirmarEliminar" class="red mr-auto" type="submit"
                        name="eliminar_registro">Eliminar</button>
                </form>
                <button type="button" class="yellow ml-auto" data-dismiss="modal">Cancelar</button>
            </div>
        </div>
    </div>
</div>


<!-- Scripts y Estilos -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>


<script>
    $(document).ready(function () {
        // Evento de muestra de datos en el modal de usuario
        $('#userModal').on('show.bs.modal', function () {
            $('#nombreUsuario').text('<?php echo isset($_SESSION['nombres']) ? $_SESSION['nombres'] : ''; ?>');
            $('#apellidoUsuario').text('<?php echo isset($_SESSION['apellidos']) ? $_SESSION['apellidos'] : ''; ?>');
            $('#correoUsuario').text('<?php echo isset($_SESSION['email']) ? $_SESSION['email'] : ''; ?>');
        });
        function closeConfirmModal() {
            $('#confirmEliminarModal').modal('hide');
        }
    });
</script>


<style>
    .yellow {
        margin-right: 10px;
        padding: 7px 10px;
        border-radius: 5px;
        color: #3c3c3c;
        text-decoration: none;
        overflow: hidden;
        transition: .5s;
        background-color: transparent;
        border: none;
        cursor: pointer;
        border-bottom: solid 1px rgba(255, 251, 0, 0.7);
        background-color: rgba(255, 251, 0, 0.1);
        box-shadow: 0px 0px 2px #FFFB00, 0 0 2px #FFFB00, 0 0 2px #FFFB00, 0 0 0px #FFFB00;
    }

    .red {
        padding: 7px 10px;
        border-radius: 5px;
        color: #3c3c3c;
        text-decoration: none;
        overflow: hidden;
        transition: .5s;
        background-color: transparent;
        border: none;
        cursor: pointer;
        border-bottom: solid 1px rgba(255, 0, 0, 0.6);
        background-color: rgba(255, 0, 0, 0.1);
        box-shadow: 0 0 2px #ff0000, 0 0 2px #ff0000, 0 0 2px #ff0202, 0 0 0px #ff0000
    }

    .yellow:hover {
        text-decoration: none;
        background: rgba(255, 251, 0, 0.4);
        color: black;
        border-radius: 5px;
        box-shadow: 0 0 2px #FFFB00, 0 0 4px #FFFB00, 0 0 6px #FFFB00, 0 0 8px #FFFB00;
    }

    .red:hover {
        text-decoration: none;
        background: rgba(255, 0, 0, 0.4);
        color: black;
        border-radius: 5px;
        box-shadow: 0 0 2px #ff0000, 0 0 4px #ff0000, 0 0 6px #ff0202, 0 0 8px #ff0000;
    }

    .user-info-container {
        color: #3c3c3c;
        text-decoration: none;
        overflow: hidden;
        transition: .5s;
        background-color: transparent;
        border: none;
        cursor: pointer;
        border-bottom: solid 1px rgba(255, 0, 0, 0.9);
        background-color: rgba(255, 0, 0, 0.6);
        box-shadow: 0 0 2px #ff0000, 0 0 2px #ff0000, 0 0 2px #ff0202, 0 0 0px #ff0000;
        
    }

    .modal-header {
        color: red;
    }

    .modal-content {
        background-color: #f0f0f0;
        padding: 20px;
    }

    input:focus {
        border-color: red !important;
    }
</style>