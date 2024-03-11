<!DOCTYPE html>
<?php
require_once('../config/conexion.php');



?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Olvido su contraseña</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="../style/HeaderFooter.css">
    <link rel="stylesheet" href="../style/mundo_aventura.css">
</head>

<body>
    <div class="wrapper">
        <nav id="custom-navbar" class="navbar navbar-expand-lg navbar-light navbar-dark-bg">
            <div class="container-fluid" id="header">
                <a class="navbar-brand Logo" href="../index.php"><img src="../Imagenes/Logo.png" alt="Logo"></a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav justify-content-end">
                        <li class="nav-item">
                            <a class="nav-link rojo" id="mapa" href="../mapa.php">Mapa</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link amarillo" id="calendario" href="../calendario.php">Calendario</a>
                        </li>
                        <?php
                        if (isset($_SESSION['user_id'])) {
                            echo '<li class="nav-item">
                            <a class="nav-link amarillo" id="calendario" href="../reg_establecimiento.php">registra tu establecimiento</a>
                            </li>';
                        } else {
                            echo '';
                        }
                        if (isset($_SESSION['user_id'])) {
                            echo '<li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <img src="../Imagenes/usuario.png" alt="Imagen de perfil" width="32" height="32"> 
                                    
                                </a>
                                <div class="dropdown-menu" aria-labelledby="userDropdown" style="margin-left: -18px; margin-top:10px;">
                                <span class="user-info-container nombreUsuario" style="background-color: red; color: white; ">' . $_SESSION['nombres'] . '</span>
                                    <br>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="#" data-toggle="modal" data-target="#userModal">Opciones</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="#" data-toggle="modal" data-target="#confirmLogoutModal">Cerrar sesión</a>
                                </div>
                            </li>';
                        } else {
                            echo '<li class="nav-item">
                        <a class="nav-link rojo" id="main" href="../main.php">Ingresar</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link amarillo" id="registro" href="../registro.php">Registro</a>
                    </li>';
                        }

                        ?>


                        <div class="modal fade" id="userModal" tabindex="-1" role="dialog"
                            aria-labelledby="userModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="userModalLabel">Mis Datos</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form id="editForm" method="post" action="php/actualizar.php">
                                            <ul class="list-group">
                                                <li class="list-group-item">Nombre: <span id="nombreUsuario">
                                                        <?php echo isset($_SESSION['nombres']) ? $_SESSION['nombres'] : ''; ?>
                                                    </span>
                                                    <input type="text" name="nuevoNombre" id="editNombre"
                                                        class="form-control" required>
                                                </li>
                                                <li class="list-group-item">Apellido: <span id="apellidoUsuario">
                                                        <?php echo isset($_SESSION['apellidos']) ? $_SESSION['apellidos'] : ''; ?>
                                                    </span>
                                                    <input type="text" name="nuevoApellido" id="editApellido"
                                                        class="form-control" required>
                                                </li>
                                                <li class="list-group-item">Correo: <span id="correoUsuario">
                                                        <?php echo isset($_SESSION['email']) ? $_SESSION['email'] : ''; ?>
                                                    </span>
                                                    <input type="email" name="nuevoCorreo" id="editCorreo"
                                                        class="form-control" required>
                                                </li>
                                            </ul>
                                            <br>
                                            <button type="submit" id="btnGuardarCambios" class="btn btn-success">Guardar
                                                Cambios</button>
                                        </form>

                                    </div>
                                    <div class="modal-footer">
                                        <button id="btnConfirmar" class="btn btn-success"
                                            style="display: none;">Confirmar</button>
                                        <button id="btnCancelar" class="btn btn-secondary"
                                            style="display: none;">Cancelar</button>
                                        <a id="btnEliminarCuenta" class="btn btn-danger" href="#" data-toggle="modal"
                                            data-target="#confirmEliminarModal">Eliminar Cuenta</a>
                                        <button type="button" class="btn btn-secondary"
                                            data-dismiss="modal">Cerrar</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="modal fade" id="confirmEditarModal" tabindex="-1" role="dialog"
                            aria-labelledby="confirmEditarModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="confirmEditarModalLabel">Confirmar Edición</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        ¿Estás seguro de que deseas guardar los cambios?
                                    </div>
                                    <div class="modal-footer">
                                        <button id="btnGuardar" class="btn btn-success">Guardar Cambios</button>
                                        <button type="button" class="btn btn-secondary"
                                            data-dismiss="modal">Cancelar</button>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="modal fade" id="confirmEliminarModal" tabindex="-1" role="dialog"
                            aria-labelledby="confirmEliminarModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="confirmEliminarModalLabel">Confirmar Eliminar Cuenta
                                        </h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        ¿Estás seguro de que deseas eliminar tu cuenta? Esta acción no se puede
                                        deshacer.
                                    </div>
                                    <div class="modal-footer">
                                        <form method="post" action="php/eliminar.php">
                                            <button id="btnConfirmarEliminar" class="btn btn-danger">Eliminar
                                                Cuenta</button>
                                        </form>
                                        <button type="button" class="btn btn-secondary"
                                            data-dismiss="modal">Cancelar</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="modal fade" id="confirmLogoutModal" tabindex="-1" role="dialog"
                            aria-labelledby="confirmLogoutModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="confirmLogoutModalLabel">Confirmar cierre de sesión
                                        </h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        ¿Estás seguro de que quieres cerrar sesión?
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-dismiss="modal">Cancelar</button>
                                        <a class="btn btn-primary" href="../php/logout.php">Cerrar sesión</a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
                            aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title" id="myModalLabel">Mensaje</h4>
                                        <button type="button" class="close" data-dismiss="modal"
                                            aria-hidden="true">&times;</button>
                                    </div>
                                    <div class="modal-body">
                                        Debes estar logeado/Registrado para utilizar este servicio.
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-default"
                                            data-dismiss="modal">Cerrar</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

                        <!-- Asegúrate de que jQuery esté cargado antes de este script -->
                        <script>
                            $(document).ready(function () {
                                // Agrega un evento que se active cuando se muestre el modal
                                $('#userModal').on('show.bs.modal', function () {
                                    // Llena los elementos HTML con los datos del usuario
                                    $('#nombreUsuario').text('<?php echo isset($_SESSION['nombres']) ? $_SESSION['nombres'] : ''; ?>');
                                    $('#apellidoUsuario').text('<?php echo isset($_SESSION['apellidos']) ? $_SESSION['apellidos'] : ''; ?>');
                                    $('#correoUsuario').text('<?php echo isset($_SESSION['email']) ? $_SESSION['email'] : ''; ?>');
                                });
                            });
                        </script>


                        <script>
                            $(document).ready(function () {
                                // Agrega un evento de clic al botón "Editar Datos"
                                $('#btnEditar').click(function () {
                                    // Muestra los campos de entrada de datos y oculta el botón de edición
                                    $('#nombreUsuario, #apellidoUsuario, #correoUsuario').hide();
                                    $('#editNombre, #editApellido, #editCorreo').show();
                                    $('#btnGuardarCambios, #btnCancelar').show();
                                    $('#btnEditar').hide();
                                });

                                // Agrega un evento de clic al botón "Cancelar"
                                $('#btnCancelar').click(function () {
                                    // Oculta los campos de entrada de datos y muestra el botón de edición
                                    $('#nombreUsuario, #apellidoUsuario, #correoUsuario').show();
                                    $('#editNombre, #editApellido, #editCorreo').hide();
                                    $('#btnGuardarCambios, #btnCancelar').hide();
                                    $('#btnEditar').show();
                                });
                            });
                        </script>
                    </ul>
                </div>
            </div>
        </nav>

        <div id="mundo_aventura">
            <!-- Contenido de tu página "mundo_aventura" aquí -->
            <div class="container">
                <h2 class="pm">Parque Central Bavaria</h2>
                <hr class="hm">
                <div class="parrafo"><br>
                    <p id="p1">
                        El Parque Central Bavaria se encuentra en el corazón de Bogotá, cerca de importantes vías y
                        lugares de interés de la ciudad. Esto lo convierte en un lugar de fácil acceso para los
                        residentes y visitantes.
                    </p><br>
                    <p>
                        El parque cuenta con amplias áreas verdes, jardines, y zonas de descanso donde las personas
                        pueden disfrutar de un entorno natural en medio de la ciudad. Es un lugar popular para hacer
                        picnics, relajarse al aire libre o dar paseos.
                    </p><br>
                    <p>
                        El Parque Central Bavaria a menudo alberga eventos culturales, exposiciones de arte y
                        actividades recreativas. Puedes encontrar esculturas y obras de arte distribuidas en todo el
                        parque, lo que lo convierte en un lugar interesante para los amantes del arte y la cultura.
                    </p>
                    <p>
                        Horarios: 24 Horarios 
                        Precios: Gratuito
                    </p><br>
                </div>
                <img src="../php/Imagen_guardar/Parque Central Bavaria.jpeg" alt="" id="img1">
            </div>
            
            <iframe id="mapa1"
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3976.8730317684935!2d-74.0730083886504!3d4.616729542358792!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8e3f99835eb9c69d%3A0xf1243f6116bba56e!2sParque%20Central%20Bavaria!5e0!3m2!1ses-419!2sco!4v1696672400615!5m2!1ses-419!2sco"
                width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                referrerpolicy="no-referrer-when-downgrade"></iframe>
            <br>
        </div>
        <br><br><br><br>
        <?php
        include('../modales_footer.php');
        ?>
        <footer class="footer">
            <nav>
                <ul>
                    <li><a href="#" data-toggle="modal" data-target="#modalPoliticaPrivacidad">Política de
                            privacidad</a></li>
                    <li><a href="#" data-toggle="modal" data-target="#modalTerminosCondiciones">Términos y
                            condiciones</a></li>
                    <li><a href="#">Contacto</a></li>
                    <?php
                    if (isset($_SESSION['user_id'])) {
                        echo '';
                    } else {
                        echo '<li><a data-toggle="modal" data-target="#myModal" href="#">deseas registrar tu establecimiento</a></li>';
                    }
                    ?>

                </ul>

                <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title" id="myModalLabel">Mensaje</h4>
                                <button type="button" class="close" data-dismiss="modal"
                                    aria-hidden="true">&times;</button>
                            </div>
                            <div class="modal-body">
                                Debes estar logeado/Registrado para utilizar este servicio.
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                            </div>
                        </div>
                    </div>
                </div>
                <br>
                <p>© 2023 MyBog. Todos los derechos reservados.</p>
            </nav>
        </footer>
    </div>
    <script src="../Funcionamiento_por_js/confirmacion_de_contraseña.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="../Funcionamiento_por_js/editar_usuario.js"></script>

</body>

</html>