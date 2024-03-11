<?php
require_once('./config/conexion.php');



?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Olvido su contraseña</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="style/HeaderFooter.css">
    <link rel="stylesheet" href="style/evento.css">
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
                            if (isset($_SESSION['user_id'])) {
                                echo '';
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
                <h2 class="pm">Regresa el show 'Queen inmersivo' al Planetario ¡Te contamos fechas y horarios!</h2>
                <hr class="hm">
                <div class="row">
                    <div class="col-md-6">
                        <div class="musical image-container">
                            <img src="./Imagenes/musical.jpg" alt="" id="imagen1">
                            <img src="./Imagenes/domo.jpg" alt="" id="imagen2" style="display: none;">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="detalle_evento_info">
                            <p><strong>Inicio:</strong> Sábado, 6 de mayo</p>
                            <p><strong>Hora:</strong> Jueves a domingo, a las 6:30 p.m.</p>
                            <p><strong>Lugar:</strong> Domo del Planetario de Bogotá. Calle 26B No. 5-93</p>
                            <p><strong>Finaliza:</strong> Domingo 28 de mayo 2023</p>
                        </div>
                        <div class="image-preview-nav">
                            <button class="nav-button" onclick="changeImage(-1)">Imagen anterior</button>
                            <button class="nav-button" onclick="changeImage(1)">Imagen siguiente</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php
        include('modales_footer.php');
        ?>
        <footer class="footer">
            <nav>
                <ul>
                    <li><a href="#" data-toggle="modal" data-target="#modalPoliticaPrivacidad">Política de
                            privacidad</a></li>
                    <li><a href="#" data-toggle="modal" data-target="#modalTerminosCondiciones">Términos y
                            condiciones</a></li>
                    <li><a href="#" data-toggle="modal" data-target="#modalContacto">Contacto</a></li>
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
                <p>©
                    <?php echo date("Y"); ?> MyBog. Todos los derechos reservados.
                </p>
            </nav>
        </footer>

        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
        <script src="./Funcionamiento_por_js/editar_usuario.js"></script>
        <script>
            var currentImage = 1;
            var totalImages = 2;

            function changeImage(direction) {
                currentImage += direction;

                if (currentImage < 1) {
                    currentImage = totalImages;
                } else if (currentImage > totalImages) {
                    currentImage = 1;
                }

                var imageContainer = document.querySelector('.image-container');
                var imageElements = imageContainer.getElementsByTagName('img');

                for (var i = 0; i < imageElements.length; i++) {
                    imageElements[i].style.display = 'none';
                }

                var currentImageElement = imageContainer.querySelector('#imagen' + currentImage);
                currentImageElement.style.display = 'block';
            }
        </script>
        <script>
            document.getElementById('logout-form').addEventListener('submit', function (event) {
                event.preventDefault();
                $('#confirmLogoutModal').modal('show');
            });

            document.getElementById('confirm-logout-btn').addEventListener('click', function (event) {
                document.getElementById('logout-form').submit();
            });
        </script>
</body>

</html>