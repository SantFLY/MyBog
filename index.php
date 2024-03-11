<?php
require_once('./config/init_database.php');
require_once('./config/conexion.php');

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MyBog</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="style/HeaderFooter.css">
    <link rel="stylesheet" type="text/css" href="style/inicio.css">
    <style>

    </style>
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
                        if (isset($_SESSION['user_id'])) {
                            echo '<li class="nav-item">
                            <a class="nav-link amarillo" id="calendario" href="./reg_establecimiento.php">Registra tu establecimiento</a>
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
        <div class="container mt-4">
            <div class="row align-items-center">
                <div class="col-12 mt-4">
                    <div class="busqueda">
                        <input type="text" id="searchInput" name="searchInput" class="form-control"
                            placeholder="Buscar">
                        <ul id="searchResult"></ul>
                    </div>
                </div>
                <div class="col-md-6 order-md-1">
                    <div id="carousel-container" style="border: 2px solid black; border-radius: 20px; ">
                        <button id="prev-btn" style="background-color: transparent;">&lt;</button>
                        <div id="image-slider">
                            <div class="slide" data-url="./resultado.php?tabla=discotecas&nombre=ADN+Disco+Bar"><img
                                    src="Imagenes/discotecas/ADN Disco Bar.jpg" alt="Image 1"
                                    onclick="redirectToPage('./resultado.php?tabla=discotecas&nombre=ADN+Disco+Bar')">
                            </div>
                            <div class=" slide"
                                data-url="./resultado.php?tabla=discotecas&nombre=Bar+Del+Futbol+Y+La+Pola"><img
                                    src="Imagenes/discotecas/Bar Del Futbol Y La Pola.jpg" alt="Image 2"
                                    onclick="redirectToPage('./resultado.php?tabla=discotecas&nombre=Bar+Del+Futbol+Y+La+Pola')">
                            </div>
                            <div class=" slide" data-url="./resultado.php?tabla=discotecas&nombre=Añejos+bar"><img
                                    src="Imagenes/discotecas/Añejos bar.jpg" alt="Image 3"
                                    onclick="redirectToPage('./resultado.php?tabla=discotecas&nombre=Añejos+bar')">
                            </div>
                            <div class=" slide" data-url="./resultado.php?tabla=estadios&nombre=Atahualpa"><img
                                    src="Imagenes/estadios/Atahualpa.jpg" alt="Image 4"
                                    onclick="redirectToPage('./resultado.php?tabla=estadios&nombre=Atahualpa')"></div>
                            <div class=" slide"
                                data-url="./resultado.php?tabla=estadios&nombre=Nemesio+Camacho+El+Campín"><img
                                    src="Imagenes/imagen de lugares/campin.jpeg" alt="Image 5"
                                    onclick="redirectToPage('./resultado.php?tabla=estadios&nombre=Nemesio+Camacho+El+Campín')">
                            </div>
                            <div class=" slide" data-url="./resultado.php?tabla=parques&nombre=Parque+de+la+93"><img
                                    src="Imagenes/parques/Parque de la 93.jpg" alt="Image 6"
                                    onclick="redirectToPage('./resultado.php?tabla=parques&nombre=Parque+de+la+93')">
                            </div>
                            <div class=" slide" data-url="./resultado.php?tabla=parques&nombre=Parque+El+Virrey"><img
                                    src="Imagenes/parques/Parque El Virrey.jpg" alt="Image 7"
                                    onclick="redirectToPage('./resultado.php?tabla=parques&nombre=Parque+El+Virrey')">
                            </div>
                            <div class=" slide" data-url="./resultado.php?tabla=discotecas&nombre=Suramerika+BAR"><img
                                    src="Imagenes/discotecas/Suramerika BAR.jpg" alt="Image 8"
                                    onclick="redirectToPage('./resultado.php?tabla=discotecas&nombre=Suramerika+BAR')">
                            </div>
                            <div class=" slide" data-url="./resultado.php?tabla=discotecas&nombre=Triunfo+Bar+JL"><img
                                    src="Imagenes/discotecas/Triunfo bar jl.jpg" alt="Image 9"
                                    onclick="redirectToPage('./resultado.php?tabla=discotecas&nombre=Triunfo+Bar+JL')">
                            </div>
                            <div class=" slide" data-url="./resultado.php?tabla=discotecas&nombre=Con+Esto+Tengo+Bar">
                                <img src="Imagenes/discotecas/Con Esto Tengo Bar.jpg" alt="Image 10"
                                    onclick="redirectToPage('./resultado.php?tabla=discotecas&nombre=Con+Esto+Tengo+Bar')">
                            </div>
                        </div>
                        <button id="next-btn" style="background-color: transparent;">&gt;</button>

                    </div>
                </div>
                <div class="col-md-6 order-md-2">
                    <div class="palabra_clave">
                        <p>EN <strong class="strong1"> MYBOG </strong> ENCUENTRAS <br> LOS MEJORES
                            LUGARES <br> PARA VISITAR Y DISFRUTAR <br> DE <strong class="strong2"> BOGOTÁ
                            </strong> DE LA MEJOR
                            <br> MANERA.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br><br><br><br><br><br><br><br><br><br>
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

    <div class="toast" role="alert" aria-live="assertive" aria-atomic="true" data-delay="3000" style="display:none">
        <div class="toast-header">
            <strong class="mr-auto">
                <?php
                if (isset($_GET['mensajeenviado']) && $_GET['mensajeenviado'] == 'true') {
                    echo "Mensaje Enviado";
                }
                ?>
            </strong>
            <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="toast-body">
            <?php
            if (isset($_GET['mensajeenviado']) && $_GET['mensajeenviado'] == 'true') {
                echo "Nos comunicaremos contigo.";
            }
            ?>
        </div>
    </div>
    <script>
        $(document).ready(function () {
            <?php
            if (isset($_GET['mensajeenviado']) && $_GET['mensajeenviado'] == 'true') {
                echo '$(".toast").toast("show").css("display", "block");';
                echo 'setTimeout(function() { hideToast(); }, 3000);';
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

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="./Funcionamiento_por_js/editar_usuario.js"></script>
    <script>
        function redirectToPage(url) {
            // Redirigir a la URL específica cuando se hace clic en la imagen
            window.location.href = url;
        }
    </script>
    <script>
        // Cuando el documento está completamente cargado
        $(document).ready(function () {
            // Manejar el evento keyup en el campo de búsqueda
            $('#searchInput').keyup(function () {
                // Obtener el valor del campo de búsqueda
                var query = $(this).val();

                // Verificar si la longitud de la cadena es mayor que 2 caracteres
                if (query.length > 2) {
                    // Realizar la solicitud AJAX para obtener sugerencias
                    $.ajax({
                        url: 'php/getSuggestions.php', // Ruta al script PHP que obtiene sugerencias
                        method: 'POST',
                        data: { query: query }, // Enviar la consulta como datos al script PHP
                        success: function (data) {
                            // Mostrar las sugerencias en el elemento con id 'searchResult'
                            $('#searchResult').html(data);
                        }
                    });
                } else {
                    // Si la longitud de la cadena es menor o igual a 2, vaciar las sugerencias
                    $('#searchResult').html('');
                }
            });
        });

    </script>

</body>

</html>



<style>
    #carousel-container {
        width: 100%;
        margin: auto;
        overflow: hidden;
        position: relative;
    }

    #image-slider {
        display: flex;
        transition: transform 0.5s ease-in-out;
    }

    .slide {
        min-width: 100%;
        box-sizing: border-box;
        overflow: hidden;
    }

    .slide img {
        width: 600px;
        height: 350px;
        object-fit: cover;
    }

    #prev-btn,
    #next-btn {
        cursor: pointer;
        position: absolute;
        top: 50%;
        transform: translateY(-50%);
        font-size: 18px;
        color: white;
        background-color: white;
        border: none;
        padding: 8px;
        z-index: 1;
    }

    #prev-btn {
        left: 10px;
    }

    #next-btn {
        right: 10px;
    }

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
<script>
    const prevBtn = document.getElementById('prev-btn');
    const nextBtn = document.getElementById('next-btn');
    const slider = document.getElementById('image-slider');

    let currentIndex = 0;

    prevBtn.addEventListener('click', () => {
        currentIndex = (currentIndex - 1 + slider.children.length) % slider.children.length;
        updateSlider();
    });

    nextBtn.addEventListener('click', () => {
        currentIndex = (currentIndex + 1) % slider.children.length;
        updateSlider();
    });

    function updateSlider() {
        const translateValue = -currentIndex * 100 + '%';
        slider.style.transform = 'translateX(' + translateValue + ')';
    }

    // Auto avance cada 5 segundos (5000 milisegundos)
    setInterval(() => {
        currentIndex = (currentIndex + 1) % slider.children.length;
        updateSlider();
    }, 5000);
</script>