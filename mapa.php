<?php
require_once('./config/conexion.php');
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Mapa</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="style/mapa.css" />
    <link rel="stylesheet" type="text/css" href="style/HeaderFooter.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous" />

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
            <div class="modal fade" id="movedModal" tabindex="-1" aria-labelledby="movedModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content ">
                        <div class="modal-header">
                            <h5 class="modal-title" id="movedModalLabel">Selecciona</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="row" id="itemsContainer2">
                                <div class="col-md-4">
                                    <div class="centro">
                                        <a id="enlaceCentroComerciales" href="./centros_comerciales.php?tipo_de_establecimiento=Centro_Comercial&localidad="
                                            class="lugar-link">
                                            <figure>
                                                <img src="./Imagenes/modal/Centro-Comercial.gif" />
                                                <div class="capa">
                                                    <h3>Centros comerciales</h3>
                                                </div>
                                            </figure>
                                        </a>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="parque">
                                        <a id="enlaceParque" href="./informacion.php?tipo_de_establecimiento=Parques&localidad=" + localidad class="lugar-link"
                                            data-lugar="parque">
                                            <figure>
                                                <img src="./Imagenes/imagen de lugares/parque.jpeg" />
                                                <div class="capa">
                                                    <h3>parque</h3>
                                                </div>
                                            </figure>
                                        </a>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="hospedaje">
                                        <a id="enlaceHospedaje" href="./hospedaje.php?tipo_de_establecimiento=Hospedaje&localidad=" + localidad class="lugar-link">
                                            <figure>
                                                <img src="./Imagenes/modal/Hotel.jpeg" />
                                                <div class="capa">
                                                    <h3>Hospedaje</h3>
                                                </div>
                                            </figure>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="row" id="itemsContainer2">
                                <div class="col-md-4">
                                    <div class="estadio">
                                        <a id="enlaceestadio" href="./estadio.php?localidad=" class="lugar-link">
                                            <figure>
                                                <img src="./Imagenes/imagen de lugares/campin.jpeg" />
                                                <div class="capa">
                                                    <h3>estadios</h3>
                                                </div>
                                            </figure>
                                        </a>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="Discoteca">
                                        <a id="enlaceDiscoteca" href="./Discotecas.php?tipo_de_establecimiento=Discotecas&localidad=" class="lugar-link">
                                            <figure>
                                                <img src="./Imagenes/modal/Discoteca.jpeg" />
                                                <div class="capa">
                                                    <h3>Discotecas</h3>
                                                </div>
                                            </figure>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <br>
            <div class="container-fluid" id="contenido">
                <div class="titulo1">
                    <h1>Localidades de Bogotá</h1>
                </div>
                <input type="text" id="searchInput2" placeholder="Busca la localidad"
                    class="mx-auto my-auto d-block mb-4 ">
                <div class="row" id="localidadesContainer">
                    <div class="col-md-4 col-sm-6 col-xs-12">
                        <div class="Antonio_Narino">
                            <button data-toggle="modal" data-target="#movedModal" class="localidad-btn"
                                data-localidad="Antonio_Nariño" style="background: transparent; border: none;">
                                <figure>
                                    <img src="./Imagenes/img de localidades/Antonio_Nariño.jfif" />
                                    <div class="capa">
                                        <h3>Antonio Nariño</h3>
                                        <p>
                                            Antonio Nariño es conocida por ser un área culturalmente diversa y cuenta
                                            con una población multicultural.
                                        </p>
                                    </div>
                                </figure>
                            </button>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-6 col-xs-12">
                        <div class="Barrios_Unidos">
                            <button data-toggle="modal" data-target="#movedModal" class="localidad-btn"
                                data-localidad="Barrios_Unidos" style="background: transparent; border: none;">
                                <figure>
                                    <img src="./Imagenes/img de localidades/Barrios_Unidos.jfif" />
                                    <div class="capa">
                                        <h3>Barrios Unidos</h3>
                                        <p>
                                            La localidad de Barrios Unidos es una mezcla de áreas residenciales y
                                            comerciales
                                        </p>
                                    </div>
                                </figure>
                            </button>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-6 col-xs-12">
                        <div class="Bosa">
                            <button data-toggle="modal" data-target="#movedModal" class="localidad-btn"
                                data-localidad="Bosa" style="background: transparent; border: none;">
                                <figure>
                                    <img src="./Imagenes/img de localidades/Bosa.jpg" />
                                    <div class="capa">
                                        <h3>Bosa</h3>
                                        <p>
                                            Bosa cuenta con varios parques y espacios públicos donde los residentes
                                            pueden disfrutar de actividades al aire libre
                                        </p>
                                    </div>
                                </figure>
                            </button>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-6 col-xs-12">
                        <div class="Candelaria">
                            <button data-toggle="modal" data-target="#movedModal" class="localidad-btn"
                                data-localidad="Candelaria" style="background: transparent; border: none;">
                                <figure>
                                    <img src="./Imagenes/img de localidades/Candelaria.jpg" />
                                    <div class="capa">
                                        <h3>Candelaria</h3>
                                        <p>
                                            Dada su riqueza histórica y cultural, la Candelaria es un destino turístico
                                            importante en Bogotá. Los visitantes pueden explorar sus museos.
                                        </p>
                                    </div>
                                </figure>
                            </button>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-6 col-xs-12">
                        <div class="Chapinero">
                            <button class="localidad-btn" data-toggle="modal" data-target="#movedModal"
                                data-localidad="Chapinero" style="background: transparent; border: none;">
                                <figure>
                                    <img src="./Imagenes/img de localidades/Chapinero.jpeg" />
                                    <div class="capa">
                                        <h3>Chapinero</h3>
                                        <p>
                                            Chapinero se encuentra en el norte de Bogotá y es una de las localidades más
                                            céntricas de la ciudad.
                                        </p>
                                    </div>
                                </figure>
                            </button>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-6 col-xs-12">
                        <div class="Ciudad_Bolivar">
                            <button data-toggle="modal" data-target="#movedModal" class="localidad-btn"
                                data-localidad="Ciudad_Bolivar" style="background: transparent; border: none;">
                                <figure>
                                    <img src="./Imagenes/img de localidades/Ciudad_Bolivar.jpeg" />
                                    <div class="capa">
                                        <h3>Ciudad Bolivar</h3>
                                        <p>
                                            Ciudad Bolívar es principalmente una zona residencial con una alta densidad
                                            de población.
                                        </p>
                                    </div>
                                </figure>
                            </button>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-6 col-xs-12">
                        <div class="Engativa" data-localidad="Engativa">
                            <button data-toggle="modal" data-target="#movedModal" class="localidad-btn"
                                data-localidad="Engativa" style="background: transparent; border: none;">
                                <figure>
                                    <img src="./Imagenes/img de localidades/Engativa.png" />
                                    <div class="capa">
                                        <h3>Engativa</h3>
                                        <p>
                                            La localidad cuenta con una amplia gama de opciones comerciales y de
                                            servicios.
                                        </p>
                                    </div>
                                </figure>
                            </button>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-6 col-xs-12">
                        <div class="Fontibon">
                            <button data-toggle="modal" data-target="#movedModal" class="localidad-btn"
                                data-localidad="Fontibon" style="background: transparent; border: none;">
                                <figure>
                                    <img src="./Imagenes/img de localidades/Fontibon.jpg" />
                                    <div class="capa">
                                        <h3>Fontibon</h3>
                                        <p>
                                            Fontibón tiene una rica herencia cultural y tradiciones arraigadas. Cuenta
                                            con festivales y eventos culturales
                                        </p>
                                    </div>
                                </figure>
                            </button>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-6 col-xs-12">
                        <div class="Kennedy">
                            <button data-toggle="modal" data-target="#movedModal" data-localidad="Kennedy"
                                class="localidad-btn" style="background: transparent; border: none;">
                                <figure>
                                    <img src="./Imagenes/img de localidades/Kennedy.jpg" />
                                    <div class="capa">
                                        <h3>Kennedy</h3>
                                        <p>
                                            Kennedy es una localidad con un carácter residencial y comercial. Aquí
                                            encontrarás una gran variedad de viviendas,
                                        </p>
                                    </div>
                                </figure>
                            </button>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-6 col-xs-12">
                        <div class="Los_Martires">
                            <button data-toggle="modal" data-target="#movedModal" class="localidad-btn"
                                data-localidad="Los_Martires" style="background: transparent; border: none;">
                                <figure>
                                    <img src="./Imagenes/img de localidades/Los_Martires.jpg" />
                                    <div class="capa">
                                        <h3>Los Martires</h3>
                                        <p>
                                            La seguridad en Los Mártires ha mejorado en los últimos años, y se han
                                            implementado medidas para proteger a los residentes y visitantes en esta
                                            zona de alto tráfico.
                                        </p>
                                    </div>
                                </figure>
                            </button>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-6 col-xs-12">
                        <div class="Puente_Aranda">
                            <button class="localidad-btn" data-toggle="modal" data-target="#movedModal"
                                data-localidad="Puente_Aranda" style="background: transparent; border: none;">
                                <figure>
                                    <img src="./Imagenes/img de localidades/Puente_Aranda.jpg" />
                                    <div class="capa">
                                        <h3>Puente Aranda</h3>
                                        <p>
                                            Puente Aranda es un centro importante de comercio mayorista, donde se
                                            realizan transacciones comerciales
                                        </p>
                                    </div>
                                </figure>
                            </button>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-6 col-xs-12">
                        <div class="Rafael_Uribe_Uribe">
                            <button class="localidad-btn" data-toggle="modal" data-target="#movedModal"
                                data-localidad="Rafael_Uribe_Uribe" style="background: transparent; border: none;">
                                <figure>
                                    <img src="./Imagenes/img de localidades/Rafael_Uribe_Uribe.jfif" />
                                    <div class="capa">
                                        <h3>Rafael Uribe Uribe</h3>
                                        <p>
                                            La localidad está bien conectada con el sistema de transporte público de
                                            Bogotá, incluyendo buses
                                        </p>
                                    </div>
                                </figure>
                            </button>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-6 col-xs-12">
                        <div class="San_Cristobal">
                            <button class="localidad-btn" data-toggle="modal" data-target="#movedModal"
                                data-localidad="San_Cristobal" style="background: transparent; border: none;">
                                <figure>
                                    <img src="./Imagenes/img de localidades/San_Cristobal.jpg" />
                                    <div class="capa">
                                        <h3>San Cristobal</h3>
                                        <p>
                                            La localidad alberga instituciones educativas que ofrecen desde educación
                                            preescolar hasta educación superior.
                                        </p>
                                    </div>
                                </figure>
                            </button>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-6 col-xs-12">
                        <div class="Santafe">
                            <button class="localidad-btn" data-toggle="modal" data-target="#movedModal"
                                data-localidad="Santa_Fe" style="background: transparent; border: none;">
                                <figure>
                                    <img src="./Imagenes/img de localidades/Santafe.jfif" />
                                    <div class="capa">
                                        <h3>Santa Fe</h3>
                                        <p>
                                            La localidad se caracteriza por su arquitectura colonial y neoclásica
                                        </p>
                                    </div>
                                </figure>
                            </button>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-6 col-xs-12">
                        <div class="Suba">
                            <button class="localidad-btn" data-toggle="modal" data-target="#movedModal"
                                data-localidad="Suba" style="background: transparent; border: none;">
                                <figure>
                                    <img src="./Imagenes/img de localidades/Suba.jpg" />
                                    <div class="capa">
                                        <h3>Suba</h3>
                                        <p>
                                            Suba dispone de parques y espacios públicos donde los residentes pueden
                                            disfrutar de actividades al aire libre.
                                        </p>
                                    </div>
                                </figure>
                            </button>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-6 col-xs-12">
                        <div class="Sumapaz">
                            <button class="localidad-btn" data-toggle="modal" data-target="#movedModal"
                                data-localidad="Sumapaz" style="background: transparent; border: none;">
                                <figure>
                                    <img src="./Imagenes/img de localidades/Sumapaz.jpg" />
                                    <div class="capa">
                                        <h3>Sumapaz</h3>
                                        <p>
                                            Sumapaz es la localidad más grande de Bogotá y una de las más extensas de
                                            Colombia.
                                        </p>
                                    </div>
                                </figure>
                            </button>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-6 col-xs-12">
                        <div class="Teusaquillo">
                            <button class="localidad-btn" data-toggle="modal" data-target="#movedModal"
                                data-localidad="Teusaquillo" style="background: transparent; border: none;">
                                <figure>
                                    <img src="./Imagenes/img de localidades/Teusaquillo.jpg" />
                                    <div class="capa">
                                        <h3>Teusaquillo</h3>
                                        <p>
                                            La localidad presenta una interesante mezcla de estilos arquitectónicos.
                                        </p>
                                    </div>
                                </figure>
                            </button>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-6 col-xs-12">
                        <div class="Tunjuelito">
                            <button class="localidad-btn" data-toggle="modal" data-target="#movedModal"
                                data-localidad="Tunjuelito" style="background: transparent; border: none;">
                                <figure>
                                    <img src="./Imagenes/img de localidades/Tunjuelito.jpg" />
                                    <div class="capa">
                                        <h3>Tunjuelito</h3>
                                        <p>
                                            A pesar de su tamaño reducido en comparación con otras localidades,
                                            Tunjuelito tiene una comunidad activa.
                                        </p>
                                    </div>
                                </figure>
                            </button>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-6 col-xs-12">
                        <div class="Usaquen">
                            <button class="localidad-btn" data-toggle="modal" data-target="#movedModal"
                                data-localidad="Usaquen" style="background: transparent; border: none;">
                                <figure>
                                    <img src="./Imagenes/img de localidades/Usaquen.jfif" />
                                    <div class="capa">
                                        <h3>Usaquen</h3>
                                        <p>
                                            Usaquén es famosa por su actividad comercial y gastronómica. Aquí
                                            encontrarás mercados.
                                        </p>
                                    </div>
                                </figure>
                            </button>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-6 col-xs-12">
                        <div class="Usme">
                            <button class="localidad-btn" data-toggle="modal" data-target="#movedModal"
                                data-localidad="Usme" style="background: transparent; border: none;">
                                <figure>
                                    <img src="./Imagenes/img de localidades/Usme.jpg" />
                                    <div class="capa">
                                        <h3>Usme</h3>
                                        <p>
                                            Usme conserva algunas tradiciones culturales propias, y en eventos
                                            especiales, es posible que se realicen celebraciones y festividades locales.
                                        </p>
                                    </div>
                                </figure>
                            </button>
                        </div>
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
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="Funcionamiento_por_js/editar_usuario.js"></script>

    <script>
        $(document).ready(function () {
            // Función para actualizar la información del parque según la localidad seleccionada
            function actualizarInformacionParque(localidad) {
                // Actualizar el atributo href del enlace "parque" con la localidad seleccionada
                $("#enlaceParque").attr("href", "./informacion.php?tipo_de_establecimiento=Parques&localidad=" + localidad);

                // Aquí deberías realizar una llamada AJAX para obtener la información del parque según la localidad seleccionada
                // En este ejemplo, simplemente se muestra un mensaje de demostración
                var mensajeDemo = "Parques para " + localidad;
                $(".parque h3").text(mensajeDemo);
            }

            // Manejar el evento de clic en los botones de localidades
            $(".localidad-btn").click(function () {
                var localidadSeleccionada = $(this).data("localidad");
                actualizarInformacionParque(localidadSeleccionada);
            });

            // Puedes agregar más eventos para otras interacciones si es necesario
        });
    </script>


    <script>
        $(document).ready(function () {
            // Función para actualizar la información de los centros comerciales según la localidad seleccionada
            function actualizarInformacionCentrosComerciales(localidad) {
                // Actualizar el atributo href del enlace "centros comerciales" con la localidad seleccionada
                $("#enlaceCentroComerciales").attr("href", "./centros_comerciales.php?tipo_de_establecimiento=Centro_Comercial&localidad=" + localidad );

                // Aquí deberías realizar una llamada AJAX para obtener la información de los centros comerciales según la localidad seleccionada
                // En este ejemplo, simplemente se muestra un mensaje de demostración
                var mensajeDemo = "Centros Comerciales para " + localidad;
                $(".centro h3").text(mensajeDemo);
            }

            // Manejar el evento de clic en los botones de localidades
            $(".localidad-btn").click(function () {
                var localidadSeleccionada = $(this).data("localidad");
                actualizarInformacionCentrosComerciales(localidadSeleccionada);
            });

            // Puedes agregar más eventos para otras interacciones si es necesario
        });
    </script>

    <script>
        $(document).ready(function () {
            // Función para actualizar la información de los centros comerciales según la localidad seleccionada
            function actualizarInformacionHospedajes(localidad) {
                // Actualizar el atributo href del enlace "centros comerciales" con la localidad seleccionada
                $("#enlaceHospedaje").attr("href", "./hospedaje.php?tipo_de_establecimiento=Centro_Comercial&localidad=" + localidad);

                // Aquí deberías realizar una llamada AJAX para obtener la información de los centros comerciales según la localidad seleccionada
                // En este ejemplo, simplemente se muestra un mensaje de demostración
                var mensajeDemo = "Hospedaje para " + localidad;
                $(".hospedaje h3").text(mensajeDemo);
            }

            // Manejar el evento de clic en los botones de localidades
            $(".localidad-btn").click(function () {
                var localidadSeleccionada = $(this).data("localidad");
                actualizarInformacionHospedajes(localidadSeleccionada);
            });

            // Puedes agregar más eventos para otras interacciones si es necesario
        });
    </script>

    <script>
        $(document).ready(function () {
            // Función para actualizar la información de los centros comerciales según la localidad seleccionada
            function actualizarInformacionDiscotecas(localidad) {
                // Actualizar el atributo href del enlace "centros comerciales" con la localidad seleccionada
                $("#enlaceDiscoteca").attr("href", "./Discotecas.php?tipo_de_establecimiento=Discotecas&localidad=" + localidad);

                // Aquí deberías realizar una llamada AJAX para obtener la información de los centros comerciales según la localidad seleccionada
                // En este ejemplo, simplemente se muestra un mensaje de demostración
                var mensajeDemo = "Discoteca para " + localidad;
                $(".Discoteca h3").text(mensajeDemo);
            }

            // Manejar el evento de clic en los botones de localidades
            $(".localidad-btn").click(function () {
                var localidadSeleccionada = $(this).data("localidad");
                actualizarInformacionDiscotecas(localidadSeleccionada);
            });

            // Puedes agregar más eventos para otras interacciones si es necesario
        });
    </script>
    <script>
        $(document).ready(function () {
            // Función para actualizar la información del parque según la localidad seleccionada
            function actualizarInformacionEstadios(localidad) {
                // Actualizar el atributo href del enlace "parque" con la localidad seleccionada
                $("#enlaceestadio").attr("href", "./estadios.php?localidad=" + localidad);

                // Aquí deberías realizar una llamada AJAX para obtener la información del parque según la localidad seleccionada
                // En este ejemplo, simplemente se muestra un mensaje de demostración
                var mensajeDemo = "Estadios para " + localidad;
                $(".estadio h3").text(mensajeDemo);
            }

            // Manejar el evento de clic en los botones de localidades
            $(".localidad-btn").click(function () {
                var localidadSeleccionada = $(this).data("localidad");
                actualizarInformacionEstadios(localidadSeleccionada);
            });

            // Puedes agregar más eventos para otras interacciones si es necesario
        });
    </script>

<script>

    </script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const searchInput = document.getElementById('searchInput2');
            const localidadesContainer = document.getElementById('localidadesContainer');
            const localidades = localidadesContainer.querySelectorAll('.col-md-4');

            searchInput.addEventListener('input', function () {
                const searchTerm = searchInput.value.trim().toLowerCase();

                localidades.forEach(function (localidad) {
                    const nombreLocalidad = localidad.querySelector('h3').textContent.toLowerCase();
                    const match = nombreLocalidad.includes(searchTerm);

                    // Show/hide the localidad div based on the match
                    const localidadDiv = localidad.querySelector('.localidad-btn');
                    if (match) {
                        localidadDiv.style.display = 'block'; // Show the localidad
                        // Move the matched card to the top
                        localidadesContainer.prepend(localidad);
                    } else {
                        localidadDiv.style.display = 'none'; // Hide the localidad
                    }
                });
            });
        });


    </script>
    <style>
       


        #searchInput2 {
            border-radius: 15px;
            width: 250px;
            height: 40px;


        }

        .titulo1 {
            text-align: center;
            margin-bottom: 50px;
            color: red;

        }

        .modal-content{
            width: 110%;
            
        }
        
       
    </style>