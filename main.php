<?php
require_once('./config/conexion.php');

// Verificar si se ha enviado el formulario
if($_SERVER['REQUEST_METHOD'] === 'POST') {
    include_once('./php/login.php');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Olvido su contraseña</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="style/Diseño.css">
    <link rel="stylesheet" href="style/HeaderFooter.css">
</head>

<body>
    <div class="wrapper">
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
        <div class="container">
            <div class="row">
                <div class="col-md-6 order-md-1">
                    <div class="login-box">
                        <h2>Iniciar Sesión</h2>
                        <form action="main.php" method="post">
                            <div class="form-group">
                                <input type="email" class="form-control" name="Email" required
                                    pattern="[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,50}$">
                                <label for="email">Correo</label>
                            </div>
                            <br>
                            <div class="form-group">
                                <input type="password" class="form-control" name="Password" required minlength="8"
                                    maxlength="15" pattern="[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{8,15}$">
                                <label for="password">Contraseña</label>
                                <a href="./contraseñaf.php">¿Olvidaste tu Contraseña?</a>
                            </div>
                            <button type="submit" class="btn btn-primary btn-block">Iniciar</button>
                        </form>
                    </div>
                </div>
                <div class="col-md-6 order-md-2">
                    <img class="ciudad" src="./Imagenes/ciudad.png" alt="ciudad">
                </div>
            </div>
        </div>
    </div>
    <?php
    include('modales_footer.php');
    ?>
    <br><br><br><br><br><br><br><br><br><br><br><br><br>
    <footer class="footer">
        <nav>
            <ul>
                <li><a href="#" data-toggle="modal" data-target="#modalPoliticaPrivacidad">Política de
                        privacidad</a></li>
                <li><a href="#" data-toggle="modal" data-target="#modalTerminosCondiciones">Términos y
                        condiciones</a></li>
                <li><a href="#" data-toggle="modal" data-target="#modalContacto">Contacto</a></li>
                <?php
                if(isset($_SESSION['user_id'])) {
                    echo '';
                } else {
                    echo '<li><a data-toggle="modal" data-target="#myModal" href="#">¿Deseas registrar tu establecimiento?</a></li>';
                }
                ?>

            </ul>

            <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" id="myModalLabel">Mensaje</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
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
            <p>©
                <?php echo date("Y"); ?> MyBog. Todos los derechos reservados.
            </p>
        </nav>
    </footer>

    <div class="overlaytoast" id="overlaytoast"></div>

    <!--toast de cuenta eliminada -->
    <div class="toast" role="alert" aria-live="assertive" aria-atomic="true" data-delay="3000" style="display:none">
        <div class="toast-header">
            <strong class="mr-auto">
                <?php
                if(isset($_GET['cuentaEliminada']) && $_GET['cuentaEliminada'] == 'true') {
                    echo "Cuenta eliminada";
                }
                ?>
            </strong>
            <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="toast-body">
            <?php
            if(isset($_GET['cuentaEliminada']) && $_GET['cuentaEliminada'] == 'true') {
                echo "Tu cuenta ha sido eliminada correctamente.";
            }
            ?>
        </div>
    </div>
    <!--toast de cuenta cerrada -->
    <div class="toast" role="alert" aria-live="assertive" aria-atomic="true" data-delay="3000" style="display:none">
        <div class="toast-header">
            <strong class="mr-auto">
                <?php
                if(isset($_GET['cuentaCerrada']) && $_GET['cuentaCerrada'] == 'true') {
                    echo "Cuenta Cerrada";
                }
                ?>
            </strong>
            <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="toast-body">
            <?php
            if(isset($_GET['cuentaCerrada']) && $_GET['cuentaCerrada'] == 'true') {
                echo "Tu cuenta ha sido cerrada correctamente.";
            }
            ?>
        </div>
    </div>
    <div class="toast" role="alert" aria-live="assertive" aria-atomic="true" data-delay="2000" style="display:none">
        <div class="toast-header">
            <strong class="mr-auto">
                <?php
                if(isset($_GET['datos_actualizados']) && $_GET['datos_actualizados'] == 'true') {
                    echo "Datos Actualizados";
                }
                ?>
            </strong>
            <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="toast-body">
            <?php
            if(isset($_GET['datos_actualizados']) && $_GET['datos_actualizados'] == 'true') {
                echo "Tu cuenta ha sido actualizada correctamente.";
            }
            ?>
        </div>
    </div>
    <!--toast de inicio sesion -->
    <div class="toast" role="alert" aria-live="assertive" aria-atomic="true" data-delay="2000" style="display:none">
        <div class="toast-header">
            <strong class="mr-auto">
                <?php
                if($loginExitoso) {
                    echo "Inicio de Sesión Exitoso";
                } elseif($cuentaInexistente) {
                    echo "Cuenta Inexistente";
                } elseif($contrasenaIncorrecta) {
                    echo "Contraseña o correo incorrecto";
                } else {
                    echo "Error en el Inicio de Sesión";
                }
                ?>
            </strong>
            <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="toast-body">
            <?php
            if($loginExitoso) {
                echo "Serás redireccionado en 2 segundo.";
            } elseif($cuentaInexistente) {
                echo "La cuenta no existe. Por favor, regístrate.";
            } elseif($contrasenaIncorrecta) {
                echo "Verifica tus credenciales.";
            } else {
                echo "Hubo un error en el inicio de sesión.";
            }
            ?>
        </div>
    </div>
    <div class="toast" role="alert" aria-live="assertive" aria-atomic="true" data-delay="2000" style="display:none">
        <div class="toast-header">
            <strong class="mr-auto">
                <?php
                if(isset($_GET['ContraseñaActualizada']) && $_GET['ContraseñaActualizada'] == 'true') {
                    echo "Contraseña Actualizada";
                }
                ?>
            </strong>
            <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="toast-body">
        <?php
            if(isset($_GET['ContraseñaActualizada']) && $_GET['ContraseñaActualizada'] == 'true') {
                echo "Tu contraseña ha sido actualizada correctamente.";
            }
            ?>
        </div>
    </div>
    <script>
        $(document).ready(function () {
            <?php
            $toastIndex = -1;

            if(isset($_GET['cuentaEliminada']) && $_GET['cuentaEliminada'] == 'true') {
                $toastIndex = 0;
            } elseif(isset($_GET['cuentaCerrada']) && $_GET['cuentaCerrada'] == 'true') {
                $toastIndex = 1;
            } elseif(isset($_GET['datos_actualizados']) && $_GET['datos_actualizados'] == 'true') {
                $toastIndex = 2;
            } elseif($_SERVER['REQUEST_METHOD'] === 'POST') {
                $toastIndex = 3;
            } elseif(isset($_GET['ContraseñaActualizada']) && $_GET['ContraseñaActualizada'] == 'true') {
                $toastIndex = 4;
            }

            if($toastIndex !== -1) {
                echo 'showToast('.$toastIndex.');';
                echo 'setTimeout(function() { hideToast(); }, 2000);';
            }
            ?>

            $(".toast").on("hidden.bs.toast", function () {
                hideOverlay();
            });

            // Verificar si hay algún toast visible
            if ($(".toast:visible").length > 0) {
                $(".overlaytoast").css("display", "block");
            } else {
                $(".overlaytoast").css("display", "none");
            }
        });

        function showToast(index) {
            $(".toast:eq(" + index + ")").toast("show").css("display", "block");
        }

        function hideToast() {
            $(".toast").toast("hide");
        }

        function hideOverlay() {
            $(".overlaytoast").toggle(false);
        }

    </script>

    <script src="./Funcionamiento_por_js/confirmacion_de_contraseña.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="./Funcionamiento_por_js/editar_usuario.js"></script>
</body>

</html>

<style>
    .toast-header {
        color: red;
        background-color: #f5f5f5;
    }

    .toast-body {
        background-color: #eeeeee;
        padding: 20px;
    }

    .toast {
        z-index: 10001;
        position: fixed;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        margin: 15px;
        max-width: 500px;
        border: 1px solid #bdbdbd;
        color: #000;
        border-radius: 5px;
    }

    .overlaytoast {
        position: fixed;
        top: 0;
        left: 0;
        width: 100vw;
        height: 100vh;
        background: rgba(0, 0, 0, 0.5);
        z-index: 10000;
        display: none;
    }
</style>