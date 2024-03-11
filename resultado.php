<?php
require_once('./config/conexion.php');
include('modales_footer.php');

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>seleccionado</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="style/registro.css">
    <link rel="stylesheet" type="text/css" href="style/HeaderFooter.css">
    <script src="https://api.mapbox.com/mapbox-gl-js/v2.6.1/mapbox-gl.js"></script>
    <link href="https://api.mapbox.com/mapbox-gl-js/v2.6.1/mapbox-gl.css" rel="stylesheet" />
    <style>
        .detalle-establecimiento {
            max-width: 1000px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0px 0px 10px 5px rgba(0, 0, 0, 0.1);
            margin-top: 30px;
            overflow: hidden;
            margin-left: 30px;
            /* Para evitar que la imagen flote fuera del contenedor */
        }

        .detalle-establecimiento h2 {
            color: #f39c12;
            margin-bottom: 20px;
        }

        .detalle-establecimiento p {
            color: #555;
            line-height: 1.6;
            margin-bottom: 15px;
        }

        .detalle-establecimiento img {
            max-width: 100%;
            height: 400px;
            /* Cambia 400px al valor deseado */
            object-fit: cover;
            object-position: center;
            margin-bottom: 20px;
            border-radius: 5px;
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.2);
        }

        .mapa {
            height: 96.1%;
            width: 90%;
            margin-top: 30px;
            border-radius: 10px;
            box-shadow: 0px 0px 10px 5px rgba(0, 0, 0, 0.1);
        }

        @media (max-width: 768px) {
            .detalle-establecimiento {
                margin-left: 0;
                margin-right: 0px;
            }

            .mapa {
                height: 300px;
                /* Altura ajustada para pantallas medianas */
            }
        }

        @media (max-width: 576px) {
            .mapa {
                height: 200px;
                /* Altura ajustada para pantallas pequeñas */
            }
        }
    </style>

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

            <br>
            <div class="row">
                <div class="col-md-6">
                    <div class="detalle-establecimiento">
                        <?php
                        // Verifica si los parámetros 'tabla' y 'nombre' están presentes en la URL
                        if (isset($_GET['tabla']) && isset($_GET['nombre'])) {
                            $tabla = $_GET['tabla'];
                            $nombre = $_GET['nombre'];


                            // Asegúrate de que solo se permitan ciertas tablas (evita posibles ataques)
                            $tablasPermitidas = array('parques', 'discotecas', 'centros_comerciales', 'estadios', 'hospedaje', 'registro_de_establecimiento');
                            if (in_array($tabla, $tablasPermitidas)) {
                                // Determina el nombre de la columna basándote en la tabla
                                switch ($tabla) {
                                    case 'parques':
                                        $nombre_imagen = 'nombre_imagen';
                                        $columnaNombre = 'Nombre_de_parques';
                                        $columnaUbicacion = 'Ubicacion_de_parques';
                                        $columnaInformacion = 'Informacion_de_parques';
                                        break;
                                    case 'centros_comerciales':
                                        $columnaNombre = 'Nombres_de_centros_comerciales';
                                        $columnaUbicacion = 'Ubicacion_de_centros_comerciales';
                                        $columnaInformacion = 'Informacion_de_centros_comerciales';
                                        break;
                                    case 'hospedaje':
                                        $nombre_imagen = 'nombre_imagen';
                                        $columnaNombre = 'Nombres_de_hospedajes';
                                        $columnaUbicacion = 'Ubicacion_de_hospedajes';
                                        $columnaInformacion = 'Informacion_de_hospedajes';
                                        break;
                                    case 'estadios':
                                        $nombre_imagen = 'nombre_imagen';
                                        $columnaNombre = 'Nombres_de_estadios';
                                        $columnaUbicacion = 'Ubicacion_de_estadios';
                                        $columnaInformacion = 'Informacion_de_estadios';
                                        break;
                                    case 'discotecas':
                                        $nombre_imagen = 'nombre_imagen';
                                        $columnaNombre = 'Nombres_de_discotecas';
                                        $columnaUbicacion = 'Ubicacion_de_discotecas';
                                        $columnaInformacion = 'Informacion_de_discotecas';
                                        break;
                                    case 'registro_de_establecimiento';
                                        $columnaNombre = 'Nombre_del_establecimiento';
                                        $columnaUbicacion = 'Direccion_de_establecimiento';
                                        $columnaInformacion = 'Informacion_adicional';
                                        break;
                                    default:
                                        $columnaNombre = 'nombre';
                                        break;
                                }
                               

                                // Construye la consulta SQL con la tabla y el nombre específico
                                $consulta = "SELECT * FROM $tabla WHERE $columnaNombre = '$nombre'";

                                // Ejecuta la consulta
                                $resultado = $conexion->query($consulta);
                                // Verifica si hay resultados
                                if ($resultado->num_rows > 0) {
                                    // Almacena los resultados en un array
                                    $informacion = $resultado->fetch_assoc();

                                    $ubicacion = str_replace(['~', '¬'], ' ', $informacion[$columnaUbicacion]);
                                    echo ('<center>');

                                    // Muestra la información de manera detallada
                                    echo '<h2>' . $informacion[$columnaNombre] . '</h2>';
                                    echo isset($informacion[$columnaUbicacion]) ? '<p>Dirección: ' . $informacion[$columnaUbicacion] . '</p>' : '';
                                    echo isset($informacion[$columnaInformacion]) ? '<p>Descripción: ' . $informacion[$columnaInformacion] . '</p>' : '';

                                    // Muestra la imagen asociada al establecimiento
                                    $imagenNombre = rawurlencode($informacion['nombre_imagen']);
                                    $imagenUrl = "Imagenes/$tabla/{$imagenNombre}"; // Ajusta la ruta según tu estructura
                                    echo '<img src="' . $imagenUrl . '" alt="' . $informacion[$columnaNombre] . '">';

                                    echo ('</center>');


                                    // Puedes seguir mostrando más detalles según la estructura de tu base de datos
                                } else {
                                    echo '<p>No se encontró información para el elemento seleccionado.</p>';
                                }
                            } else {
                                echo '<p>Tabla no permitida.</p>';
                            }
                        } else {
                            echo '<p>No se proporcionaron parámetros válidos.</p>';
                        }

                        ?>
                    </div>
                </div>

                <!-- Resto del contenido de la página resultado.php -->

                <div class="col-md-6">
                    <!-- Mapa con Mapbox -->
                    <div class="mapa" id="mapbox-map"></div>
                </div>
            </div>
        </div>
    </div>
    <?php
    include('modales_footer.php');
    ?>
    <br><br>
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
    <script src="https://api.mapbox.com/mapbox-gl-js/v2.6.1/mapbox-gl.js"></script>
    <script>
        mapboxgl.accessToken = 'pk.eyJ1Ijoic2FudGZseSIsImEiOiJjbGkwamdrYjcwMmdlM2NvOXgyN2s0aW1xIn0.c1WhoBvGP7nCERKiX-mxbQ';
        var ubicacion = "<?php echo $informacion[$columnaUbicacion]; ?>"; // Ajusta según la estructura de tu base de datos

        // Geocodificación con Mapbox
        var geocoding_url = "https://api.mapbox.com/geocoding/v5/mapbox.places/" + encodeURIComponent(ubicacion) + ".json?access_token=" + mapboxgl.accessToken;

        // Realizar la solicitud HTTP
        fetch(geocoding_url)
            .then(response => response.json())
            .then(data => {
                var coordinates = data.features[0].center;
                var latitud = coordinates[1];
                var longitud = coordinates[0];

                var map = new mapboxgl.Map({
                    container: 'mapbox-map',
                    style: 'mapbox://styles/mapbox/streets-v11',
                    center: [longitud, latitud],
                    zoom: 15
                });

                // Añade un marcador en la ubicación del establecimiento
                new mapboxgl.Marker().setLngLat([longitud, latitud]).addTo(map);
            })
            .catch(error => {
                console.error('Error en la geocodificación:', error);
            });
    </script>
</body>

</html>