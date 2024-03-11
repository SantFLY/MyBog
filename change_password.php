<?php
include('./config/recuperacion.php');
?>
<!DOCTYPE html>
<html>

<head>
    <title>Cambiar Contraseña</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="style/change_password.css">
    <link rel="stylesheet" href="style/HeaderFooter.css">

</head>




<body>

    <div class="wrapper">
        <div class="content">
            <nav id="custom-navbar" class="navbar navbar-expand-lg navbar-light navbar-dark-bg">
                <div class="container-fluid" id="header">
                    <a class="navbar-brand Logo" href="./index.php"><img src="./Imagenes/Logo.png" alt="Logo"></a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                        aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav justify-content-end">
                            <li class="nav-item">
                                <a class="nav-link rojo" id="mapa" href="./mapa.php">Mapa</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link amarillo" id="calendario" href="./calendario.php">Calendario</a>
                            </li>
                            <?php
                            if(isset($_SESSION['user_id'])) {
                                echo '<li class="nav-item">
                            <a class="nav-link amarillo" id="calendario" href="./reg_establecimiento.php">registra tu establecimiento</a>
                            </li>';
                            } else {
                                echo '';
                            }
                            include('modales_usuario.php');
                            ?>
                        </ul>
                    </div>
                </div>
            </nav>


            <br>
            <div class="container">
                <br>
                <h2>Cambiar Contraseña</h2>
                <br>
                <p> Aqui podrás restablecer tu contraseña. Asegúrate de elegir una contraseña segura, que combine
                    letras, números. Esto protegerá tu cuenta de posibles intrusiones no
                    deseadas.</p>
                <br>
                <form method="POST" action="change_password.php">
                    <div class="form-group">
                        <label for="password">Nueva Contraseña:</label>
                        <input type="password" autofocus class="form-control" name="password" require minlength="8">
                    </div>
                    <div class="form-group">
                        <label for="confirm_password">Confirmar Contraseña:</label>
                        <input type="password" class="form-control" name="confirm_password" required minlength="8"
                            require>
                    </div>
                    <input type="hidden" name="user_id" value="<?php echo $_GET['user_id']; ?>">
                    <button type="submit" class="btn btn-primary">Cambiar Contraseña</button>
                </form>
            </div>
            <?php
            include('modales_footer.php');
            ?>
        </div>
        <footer class="footer">
            <nav>
                <ul>
                    <li><a href="#" data-toggle="modal" data-target="#modalPoliticaPrivacidad">Política de
                            privacidad</a></li>
                    <li><a href="#" data-toggle="modal" data-target="#modalTerminosCondiciones">Términos y
                            condiciones</a></li>
                    <li><a href="#">Contacto</a></li>
                    <?php
                    if(isset($_SESSION['user_id'])) {
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
                </div> <br>
                <p>© 2023 MyBog. Todos los derechos reservados.</p>
            </nav>
        </footer>
        <div class="overlaytoast" id="overlaytoast"></div>
        <div class="toast" role="alert" aria-live="assertive" aria-atomic="true" data-delay="3000" style="display:none">
            <div class="toast-header">
                <strong class="mr-auto">
                    <?php
                    if($contraseñacambiada == true) {
                        echo "Contraseña Cambiada";
                    } else {
                        echo "Contraseña no actualizada";
                    }
                    ?>
                </strong>
                <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="toast-body">
                <?php
                if($contraseñacambiada == true) {
                    echo "Serás redireccionado en 1 segundo.";
                } else {
                    echo "Hubo un error en la actualización. Inténtalo de nuevo.";
                }
                ?>
            </div>
        </div>

        <script>
            $(document).ready(function () {
                <?php
                if($_SERVER['REQUEST_METHOD'] === 'POST') {
                    echo '$(".toast").toast("show").css("display", "block");';
                    echo 'setTimeout(function() { hideToast(); }, 2000);';
                }
                ?>

                // Evento cuando el toast se cierra
                $(".toast").on("hidden.bs.toast", function () {
                    hideOverlay();
                });

                // Muestra u oculta el overlay según el estado del toast
                if ($(".toast").css("display") === "block") {
                    $("#overlaytoast").css("display", "block");
                } else {
                    $("#overlaytoast").css("display", "none");
                }
            });

            function hideToast() {
                $(".toast").toast("hide");
            }

            function hideOverlay() {
                $("#overlaytoast").css("display", "none");
            }
        </script>

        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/js/bootstrap.min.js"></script>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>x
</body>

</html>