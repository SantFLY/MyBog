<!DOCTYPE html>
<?php
require_once('./config/conexion.php');
?>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Discotecas</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="style/HeaderFooter.css">
    <link rel="stylesheet" type="text/css" href="style/informacion.css">
    <style>
    .card {
      border-radius: 10px;
      background-color: #f9f9f9;
      overflow: hidden;
      margin-bottom: 20px;
      box-shadow: 15px 5px 18px rgba(0, 0, 0, 0.1);
    }

    .card h5 {
      font-size: 24px;
    }

    .card img {
      width: 100%;
      height: 200px;
      /* Establecer una altura fija para la imagen */
      object-fit: cover;
    }

    .card .card-body {
      padding: 15px;
    }

    .card .parrafo {
      height: 80px;
      /* Establecer una altura fija para el párrafo */
      overflow: hidden;
      margin-bottom: 10px;
    }

    .card .card-title {
      height: 40px;
      /* Establecer una altura fija para el título */
      overflow: hidden;
    }

    .card .card-subtitle {
      height: 30px;
      /* Establecer una altura fija para el subtítulo */
      overflow: hidden;
    }

    .card .btn {
      margin-top: 10px;
    }

    .card-deck .card {
      margin-bottom: 20px;
      width: 370px;
      height: 370px;
    }

    .pagination {
      display: flex;
      justify-content: center;
      align-items: center;
    }

    .pagination button {
      color: black;
      background-color: #f9f9f9;
      border: none;
      margin: 0 5px;
      cursor: pointer;
    }

    .pagination button:hover {
      background-color: yellow;
      color: #ff0000;
      border-radius: 5px;
      box-shadow: 0 0 5px #ff0000, 0 0 10px #ff0000, 0 0 15px #ff0202, 0 0 20px #ff0000;
    }
  </style>

</head>

<body>
    <div class="wrapper">
        <div class="content">
            <!-- Barra de navegación -->
            <nav id="custom-navbar" class="navbar navbar-expand-lg navbar-light navbar-dark-bg">
                <div class="container-fluid" id="header">
                    <!-- Logo -->
                    <a class="navbar-brand Logo" href="./index.php"><img src="./Imagenes/Logo.png" alt="Logo"></a>
                    <!-- Botón para colapsar la barra de navegación en dispositivos pequeños -->
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                        aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <!-- Enlaces de navegación -->
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

            <!-- Contenido principal -->
            <div class="inicio">
                <!-- Barra de búsqueda -->


                <!-- Sección de tarjetas -->
                <div id="mundo_aventura">
                    <div class="container">
                        <div class="card-deck">
                            <?php
                            // Verifica si la localidad está presente en la URL
                            $localidad = isset($_GET['localidad']) ? $_GET['localidad'] : '';
                            $tipo_de_establecimiento = isset($_GET['tipo_de_establecimiento']) ? $_GET['tipo_de_establecimiento'] : ''; 

                            $consultaEstablecimientos = "SELECT * FROM registro_de_establecimiento WHERE Aprobado = 1 AND localidad = '$localidad' AND tipo_de_establecimiento = 'Discoteca' ";
                            $resultadoEstablecimientos = $conexion->query($consultaEstablecimientos);

                            // Construye la consulta SQL con la condición de localidad
                            $consulta = "SELECT * FROM discotecas WHERE localidad = '$localidad'";

                            // Ejecuta la consulta
                            $resultado = $conexion->query($consulta);

                            // Verifica si hay resultados
                            if ($resultado->num_rows > 0) {
                                // Almacena los resultados en un array
                                $discotecas = $resultado->fetch_all(MYSQLI_ASSOC);

                                // Tu bucle de tarjetas de discotecas
                                foreach ($discotecas as $discoteca):
                                    ?>
                                    <!-- Tarjeta de discoteca -->
                                    <div class="col-md-4">
                                        <div class="card">
                                            <!-- Contenido de la tarjeta -->

                                            <!-- Enlace para abrir informacion.php con el nombre de la localidad en la URL -->
                                            <?php
                                            $imagenNombre = rawurlencode($discoteca['nombre_imagen']);
                                            $imagenUrl = "./Imagenes/discotecas/{$imagenNombre}"; // Ajusta la extensión según el formato de tus imágenes
                                            ?>
                                            <img class="card-img-top" src="<?php echo $imagenUrl; ?>"
                                                alt="<?php echo htmlspecialchars($discoteca['Nombres_de_discotecas']); ?>">
                                            <div class="card-body">
                                                <h5 class="card-title">
                                                    <?php echo htmlspecialchars($discoteca['Nombres_de_discotecas']); ?>
                                                </h5>
                                                <h6 class="card-subtitle mb-2 text-muted">
                                                    <?php echo htmlspecialchars($discoteca['Ubicacion_de_discotecas']); ?>
                                                </h6>
                                                <!-- Puedes agregar más detalles según tu estructura de base de datos -->
                                                <a href="resultado.php?tabla=discotecas&nombre=<?php echo urlencode($discoteca['Nombres_de_discotecas']); ?>"
                                                    class="btn btn-primary">Más información</a>
                                            </div>
                                        </div>
                                    </div>
                                    <?php
                                endforeach;
                            } else {
                                echo '<p>No se encontraron discotecas para la localidad seleccionada.</p>';
                            }

                            if ($resultadoEstablecimientos->num_rows > 0) {
                                // Almacena los resultados en un array
                                $EScentrosComerciales = $resultadoEstablecimientos->fetch_all(MYSQLI_ASSOC);


                                // Tu bucle de tarjetas de centros comerciales
                                foreach ($EScentrosComerciales as $EScentroComercial):
                                    ?>
                                    <!-- Tarjeta de centro comercial -->
                                    <div class="col-md-4">
                                        <div class="card">
                                            <!-- Contenido de la tarjeta -->



                                            <!-- Enlace para abrir informacion.php con el nombre de la localidad en la URL -->
                                            <?php

                                            $sqlImagen = "SELECT * FROM imagenes_establecimiento WHERE id_establecimiento = ?";
                                            $stmtImagen = $conexion->prepare($sqlImagen);
                                            $stmtImagen->bind_param("i", $EScentroComercial['Id_registro']);

                                            $stmtImagen->execute();
                                            $resultImagen = $stmtImagen->get_result();
                                            $imagen = $resultImagen->fetch_assoc();

                                           
                                            // Ajusta la extensión según el formato de tus imágenes
                                            ?>
                                            <img class="card-img-top" src="Imagenes/registro_de_establecimiento/<?php echo $imagen['nombre_archivo']; ?>" alt="<?php echo htmlspecialchars($EScentroComercial['Nombre_del_establecimiento']); ?>"
                                                alt="<?php echo htmlspecialchars($EScentroComercial['Nombre_del_establecimiento']); ?>">
                                            <div class="card-body">
                                                <h5 class="card-title">
                                                    <?php echo htmlspecialchars($EScentroComercial['Nombre_del_establecimiento']); ?>
                                                </h5>
                                                <h6 class="card-subtitle mb-2 text-muted">
                                                    <?php echo htmlspecialchars($EScentroComercial['Direccion_de_establecimiento']); ?>
                                                </h6>
                                                <!-- Puedes agregar más detalles según tu estructura de base de datos -->
                                                <a href="resultado2.php?tabla=registro_de_establecimiento&nombre=<?php echo urlencode($EScentroComercial['Nombre_del_establecimiento']); ?>"
                                                    class="btn btn-primary">Más información</a>
                                            </div>
                                        </div>
                                    </div>
                                    <?php
                                endforeach;
                            } else {

                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Botones de paginación y marcador de página -->

    <!-- Pie de página -->
    <footer class="footer">
        <nav>
            <ul>
                <li><a href="#" data-toggle="modal" data-target="#modalPoliticaPrivacidad">Política de
                        privacidad</a>
                </li>
                <li><a href="#" data-toggle="modal" data-target="#modalTerminosCondiciones">Términos y
                        condiciones</a>
                </li>
                <li><a href="#" data-toggle="modal" data-target="#modalContacto">Contacto</a></li>
                <?php
                if (isset($_SESSION['user_id'])) {
                    echo '';
                } else {
                    echo '<li><a data-toggle="modal" data-target="#myModal" href="#">¿Deseas registrar tu establecimiento?</a></li>';
                }
                ?>
            </ul>

            <!-- Modal de mensaje -->
            <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" id="myModalLabel">Mensaje</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        </div>
                        <div class="modal-body">
                            Debes estar logueado/registrado para utilizar este servicio.
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

    <!-- Scripts -->
    <script src="./Funcionamiento_por_js/confirmacion_de_contraseña.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="./Funcionamiento_por_js/editar_usuario.js"></script>
    <script>
        // Obtén todas las tarjetas
        const cards = document.querySelectorAll('.card');

        // Inicializa la página actual
        let currentPage = 1;

        // Función para mostrar u ocultar las tarjetas según la página
        function showCards() {
            cards.forEach((card, index) => {
                if (index >= (currentPage - 1) * <?php echo $cardsPerPage; ?> && index < currentPage * <?php echo $cardsPerPage; ?>) {
                    card.style.display = 'block';
                } else {
                    card.style.display = 'none';
                }
            });
        }

        // Función para actualizar la indicación de la página actual
        function updatePageIndicator() {
            const pageIndicator = document.getElementById('pageIndicator');
            pageIndicator.textContent = `Página ${currentPage}`;
        }

        // Función para ir a la página anterior
        function goToPreviousPage() {
            if (currentPage > 1) {
                currentPage--;
                showCards();
                updatePageIndicator();
            }
        }

        // Función para ir a la página siguiente
        function goToNextPage() {
            const totalPages = Math.ceil(<?php echo $count; ?> / <?php echo $cardsPerPage; ?>);
            if (currentPage < totalPages) {
                currentPage++;
                showCards();
                updatePageIndicator();
            }
        }

        // Agrega event listeners a los botones de paginación
        const prevButton = document.getElementById('prevButton');
        const nextButton = document.getElementById('nextButton');

        prevButton.addEventListener('click', goToPreviousPage);
        nextButton.addEventListener('click', goToNextPage);

        // Mostrar la página inicial
        showCards();
        updatePageIndicator();
    </script>
</body>

</html>