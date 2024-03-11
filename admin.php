<?php
// Incluye el archivo de configuración y conexión a la base de datos
include_once('config/conexion.php');

// Verifica el correo permitido y la sesión
$rolPermitido = 'Admin';

function verificarAcceso() {
    global $rolPermitido;

    if(!isset($_SESSION['user_id']) || $_SESSION['rol'] !== $rolPermitido) {
        // Redirigir a una página de error o mostrar un mensaje de acceso no autorizado
        echo "Acceso no autorizado";
        exit;
    }
}

// Función para eliminar un usuario
function eliminarUsuario($idUsuario) {
    global $conexion;

    $sqlEliminarUsuario = "DELETE FROM cuentas WHERE Id_Usuario = $idUsuario";
    $conexion->query($sqlEliminarUsuario);
}

// Verifica el acceso al inicio del script
verificarAcceso();

// Verifica si se ha enviado una solicitud para eliminar un usuario
if(isset($_GET['eliminarUsuario'])) {
    $idUsuarioEliminar = $_GET['eliminarUsuario'];
    eliminarUsuario($idUsuarioEliminar);
}

// Consulta para obtener todos los usuarios pendientes
$sqlUsuariosPendientes = "SELECT * FROM cuentas";
$resultUsuariosPendientes = $conexion->query($sqlUsuariosPendientes);
// Función para aprobar un establecimiento
function aprobarEstablecimiento($idEstablecimiento) {
    global $conexion;

    $sqlAprobarEstablecimiento = "UPDATE registro_de_establecimiento SET Aprobado = 1 WHERE Id_registro = $idEstablecimiento";
    $conexion->query($sqlAprobarEstablecimiento);
}

// Función para rechazar un establecimiento

// Verifica el acceso al inicio del script
verificarAcceso();

// Verifica si se ha enviado una solicitud para aprobar o rechazar un establecimiento
if(isset($_GET['aprobarEstablecimiento'])) {
    $idEstablecimientoAprobar = $_GET['aprobarEstablecimiento'];
    aprobarEstablecimiento($idEstablecimientoAprobar);
}

if(isset($_GET['rechazarEstablecimiento'])) {
    $idEstablecimientoRechazar = $_GET['rechazarEstablecimiento'];
    rechazarEstablecimiento($idEstablecimientoRechazar);
}

// Consulta para obtener todos los establecimientos pendientes
$sqlEstablecimientosPendientes = "SELECT * FROM registro_de_establecimiento WHERE Aprobado = 0";
$resultEstablecimientosPendientes = $conexion->query($sqlEstablecimientosPendientes);

$sqlEstablecimientosActivos = "SELECT r.*, GROUP_CONCAT(i.nombre_archivo) AS nombres_imagenes, GROUP_CONCAT(i.ruta_destino) AS rutas_imagenes
                               FROM registro_de_establecimiento r
                               LEFT JOIN imagenes_establecimiento i ON r.Id_registro = i.id_establecimiento
                               WHERE r.Aprobado = 1
                               GROUP BY r.Id_registro";
$resultEstablecimientosActivos = $conexion->query($sqlEstablecimientosActivos);



function rechazarEstablecimiento($idEstablecimiento) {
    global $conexion;

    $sqlRechazarEstablecimiento = "DELETE FROM registro_de_establecimiento WHERE Id_registro = $idEstablecimiento";
    $conexion->query($sqlRechazarEstablecimiento);
}

if(isset($_GET['cambiarRol']) && isset($_GET['idUsuario']) && isset($_GET['nuevoRol'])) {
    $idUsuario = $_GET['idUsuario'];
    $nuevoRol = $_GET['nuevoRol'];

    // Evita la inyección SQL usando sentencias preparadas
    $sqlCambiarRol = "UPDATE cuentas SET Rol = ? WHERE Id_Usuario = ?";
    $stmt = $conexion->prepare($sqlCambiarRol);

    // Vincula los parámetros y ejecuta la sentencia preparada
    $stmt->bind_param("si", $nuevoRol, $idUsuario);
    $stmt->execute();

    // Cierra la sentencia preparada
    $stmt->close();

    // Recargar la página para reflejar los cambios
    header('Location: admin.php');
    exit;
}


?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel de Administración</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"
        integrity="sha512-ET1F5Dmo5u2YnLv5fRrybM1dAf7tW33tDxv2kLHiDWk3kVlJq/4ZDklxMO7d/JUuMB+SZZIEhaS/zUq9NnR8RQ=="
        crossorigin="anonymous" />
    <link rel="stylesheet" type="text/css" href="style/HeaderFooter.css">
    <!-- ... (otros enlaces) ... -->
    <style>
        a:hover {
            color: black;
            text-decoration: none;
        }

        .botoncito {
            text-decoration: none;
            font-weight: 300;
            font-size: 20px;
            color: #000000;
            padding-top: 15px;
            padding-bottom: 15px;
            padding-left: 40px;
            padding-right: 40px;
            background-color: transparent;
            border-width: 2px;
            border-style: solid;
            border-color: #000000;

        }

        .botoncito:hover {
            background-color: whitesmoke;
        }

        .icon-overlay {
            width: 10%;
            height: auto;
        }

        .titulo {
            font-weight: 450;

        }
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
        <div class="container mt-5">
            <h1 class="display-4 text-center mt-5 mb-4 titulo">Panel de Administración</h1>

            <br>
            <center>
                <!-- Botón para mostrar el modal con la tabla de usuarios -->
                <button class="botoncito" data-toggle="modal" data-target="#modalUsuarios">
                    <img src="Imagenes/ajustes-de-engranajes.png" alt="" class="img-fluid icon-overlay">
                    <i class="fas fa-store"></i> Mostrar Usuarios
                </button>
            </center>
            <!-- Modal con la tabla de usuarios -->
            <div class="modal fade" id="modalUsuarios" tabindex="-1" role="dialog" aria-labelledby="modalUsuariosLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-xl" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="modalUsuariosLabel">Lista de Usuarios</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Nombres</th>
                                            <th>Apellidos</th>
                                            <th>Email</th>
                                            <th>Rol</th>
                                            <th>Acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        // Mostrar usuarios en la tabla
                                        while($rowUsuario = $resultUsuariosPendientes->fetch_assoc()) {
                                            echo "<tr>";
                                            echo "<td>{$rowUsuario['Id_Usuario']}</td>";
                                            echo "<td>{$rowUsuario['Nombres']}</td>";
                                            echo "<td>{$rowUsuario['Apellidos']}</td>";
                                            echo "<td>{$rowUsuario['Email']}</td>";
                                            echo "<td>{$rowUsuario['Rol']}</td>";
                                            echo "<td>
    <div class='d-flex align-items-center'>
        <button class='btn btn-danger' onclick='eliminarUsuario({$rowUsuario['Id_Usuario']})'>
            <i class='fas fa-trash'></i> Eliminar Usuario
        </button>
        <button class='btn btn-primary' onclick='cambiarRolUsuario({$rowUsuario['Id_Usuario']}, \"{$rowUsuario['Rol']}\")'>
            <i class='fas fa-edit'></i> Cambiar Rol
        </button>
    </div>
</td>";
                                            echo "</tr>";
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                        </div>
                    </div>
                </div>
            </div>
            <br>
            <!-- Otras secciones según tus necesidades -->
            <center>
                <!-- Botón para mostrar el modal con la tabla de establecimientos -->
                <button class="botoncito" data-toggle="modal" data-target="#modalEstablecimientos">
                    <i class="fas fa-store"></i> Mostrar Establecimientos Pendientes
                </button>
            </center>
            <!-- Modal con la tabla de establecimientos -->
            <div class="modal fade" id="modalEstablecimientos" tabindex="-1" role="dialog"
                aria-labelledby="modalEstablecimientosLabel" aria-hidden="true">
                <div class="modal-dialog modal-xl" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="modalEstablecimientosLabel">Lista de Establecimientos Pendientes
                            </h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Nombre del Establecimiento</th>
                                            <th>Dirección del Establecimiento</th>
                                            <th>Telefono</th>
                                            <th>Nit</th>
                                            <th>localidad</th>
                                            <th>Acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        // Mostrar establecimientos pendientes en la tabla
                                        while($rowEstablecimiento = $resultEstablecimientosPendientes->fetch_assoc()) {
                                            echo "<tr>";
                                            echo "<td>{$rowEstablecimiento['Id_registro']}</td>";
                                            echo "<td>{$rowEstablecimiento['Nombre_del_establecimiento']}</td>";
                                            echo "<td>".str_replace(['_'], ' ', $rowEstablecimiento['Direccion_de_establecimiento'])."</td>";
                                            echo "<td>{$rowEstablecimiento['Telefono']}</td>";
                                            echo "<td>{$rowEstablecimiento['Nit']}</td>";
                                            echo "<td>".str_replace(['_'], ' ', $rowEstablecimiento['localidad'])."</td>";

                                            echo "<td>
                                                    <div class='d-flex align-items-center'>
                                                        <a class='btn btn-success mr-2' href='admin.php?aprobarEstablecimiento={$rowEstablecimiento['Id_registro']}'>
                                                            <i class='fas fa-check'></i> Aprobar
                                                        </a>
                                                        <a class='btn btn-danger' href='admin.php?rechazarEstablecimiento={$rowEstablecimiento['Id_registro']}'>
                                                            <i class='fas fa-times'></i> Rechazar
                                                        </a>
                                                    </div>
                                                </td>";
                                            echo "</tr>";
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <br>

        <center>
            <!-- Botón para mostrar el modal con la tabla de usuarios -->
            <button class="botoncito" data-toggle="modal" data-target="#modalActivosEstablecimientos">
                <img alt="" class="img-fluid icon-overlay">
                <i class="fas fa-store"></i> Mostrar Establecimientos Activos
            </button>
        </center>
        <br>
        <center>
            <button type="button" class="botoncito" data-toggle="modal" data-target="#modalregistros">
                Registrar Nuevos Establecimientos
            </button>
        </center>

        <!-- Modal con la tabla de establecimientos -->
        <div class="modal fade" id="modalActivosEstablecimientos" tabindex="-1" role="dialog"
            aria-labelledby="modalEstablecimientosLabel" aria-hidden="true">
            <div class="modal-dialog modal-xl" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalEstablecimientosLabel">Lista de Establecimientos Activos
                        </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Nombre del Establecimiento</th>
                                        <th>Dirección del Establecimiento</th>
                                        <th>Telefono</th>
                                        <th>Nit</th>
                                        <th>localidad</th>
                                        <th>Imagenes</th>
                                        <th>Acciones</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    // Mostrar establecimientos activos en la tabla
                                    while($rowEstablecimiento = $resultEstablecimientosActivos->fetch_assoc()) {
                                        echo "<tr>";
                                        echo "<td>{$rowEstablecimiento['Id_registro']}</td>";
                                        echo "<td>{$rowEstablecimiento['Nombre_del_establecimiento']}</td>";
                                        echo "<td>".str_replace(['_'], ' ', $rowEstablecimiento['Direccion_de_establecimiento'])."</td>";
                                        echo "<td>{$rowEstablecimiento['Telefono']}</td>";
                                        echo "<td>{$rowEstablecimiento['Nit']}</td>";
                                        echo "<td>".str_replace(['_'], ' ', $rowEstablecimiento['localidad'])."</td>";

                                        echo "<td>";

                                        // Verificar si hay imágenes asociadas al establecimiento
                                        if($rowEstablecimiento['nombres_imagenes']) {
                                            $nombresImagenes = explode(',', $rowEstablecimiento['nombres_imagenes']);
                                            $rutasImagenes = explode(',', $rowEstablecimiento['rutas_imagenes']);

                                            // Mostrar las imágenes
                                            for($i = 0; $i < count($nombresImagenes); $i++) {
                                                echo "<div class='d-flex align-items-center'>
                                                        <a class='btn btn-primary imagen-container' href='javascript:void(0);' onclick='showImage(\"/MyBog/{$rutasImagenes[$i]}\")'>
                                                            <i class='fas fa-image'></i> Ver Imagen
                                                        </a>
                                                      </div>";
                                            }
                                        } else {
                                            // Mostrar un mensaje si no hay imágenes
                                            echo 'Sin imágenes';
                                        }

                                        echo "</td>";
                                        echo "<td>
                                                <div class='d-flex align-items-center'>                                            
                                                    <a class='btn btn-danger ' href='admin.php?rechazarEstablecimiento={$rowEstablecimiento['Id_registro']}'>
                                                        <i class='fas fa-times'></i> Eliminar 
                                                    </a>
                                                </div>
                                              </td>";
                                        echo "</tr>";
                                    }

                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br>



    <div class="modal fade" id="imageModal" tabindex="-1" role="dialog" aria-labelledby="imageModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="imageModalLabel">Image Preview</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <img id="modalImage" src="" alt="Image Preview" class="img-fluid">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="modalActivosEstablecimientos" tabindex="-1" role="dialog"
        aria-labelledby="modalEstablecimientosLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalEstablecimientosLabel">Lista de Establecimientos Activos
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Nombre del Establecimiento</th>
                                    <th>Dirección del Establecimiento</th>
                                    <th>Telefono</th>
                                    <th>Nit</th>
                                    <th>localidad</th>
                                    <th>Imagenes</th>
                                    <th>Acciones</th>

                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                // Mostrar establecimientos activos en la tabla
                                while($rowEstablecimiento = $resultEstablecimientosActivos->fetch_assoc()) {
                                    echo "<tr>";
                                    echo "<td>{$rowEstablecimiento['Id_registro']}</td>";
                                    echo "<td>{$rowEstablecimiento['Nombre_del_establecimiento']}</td>";
                                    echo "<td>".str_replace(['_'], ' ', $rowEstablecimiento['Direccion_de_establecimiento'])."</td>";
                                    echo "<td>{$rowEstablecimiento['Telefono']}</td>";
                                    echo "<td>{$rowEstablecimiento['Nit']}</td>";
                                    echo "<td>".str_replace(['_'], ' ', $rowEstablecimiento['localidad'])."</td>";

                                    echo "<td>";

                                    // Verificar si hay imágenes asociadas al establecimiento
                                    if($rowEstablecimiento['nombres_imagenes']) {
                                        $nombresImagenes = explode(',', $rowEstablecimiento['nombres_imagenes']);
                                        $rutasImagenes = explode(',', $rowEstablecimiento['rutas_imagenes']);

                                        // Mostrar las imágenes
                                        for($i = 0; $i < count($nombresImagenes); $i++) {
                                            echo "<div class='d-flex align-items-center'>
                                                        <a class='btn btn-primary imagen-container' href='javascript:void(0);' onclick='showImage(\"/MyBog/{$rutasImagenes[$i]}\")'>
                                                            <i class='fas fa-image'></i> Ver Imagen
                                                        </a>
                                                      </div>";
                                        }
                                    } else {
                                        // Mostrar un mensaje si no hay imágenes
                                        echo 'Sin imágenes';
                                    }

                                    echo "</td>";
                                    echo "<td>
                                                <div class='d-flex align-items-center'>                                            
                                                    <a class='btn btn-danger ' href='admin.php?rechazarEstablecimiento={$rowEstablecimiento['Id_registro']}'>
                                                        <i class='fas fa-times'></i> Eliminar 
                                                    </a>
                                                </div>
                                              </td>";
                                    echo "</tr>";
                                }





                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>
    </div>
    </div>
    <br>
    <div class="modal fade" id="modalregistros" tabindex="-1" role="dialog" aria-labelledby="modalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalLabel">Registro de Establecimientos</h5>
                    <a type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </a>
                </div>
                <div class="modal-body text-center">
                    <a type="button" class="botoncito" id="modalparque" href="registro_parques.php"
                        style="width: 300px">
                        Registrar Parque
                    </a>
                    <hr>
                    <a type="button" class="botoncito" id="modaldiscoteca" href="registro_discoteca.php"
                        style="width: 300px">
                        Registrar Discoteca
                    </a>
                    <hr>
                    <a type="button" class="botoncito" id="modalestadio" href="registro_estadio.php"
                        style="width: 300px">
                        Registrar Estadio
                    </a>
                    <hr>
                    <a type="button" class="botoncito" id="modalcentrocomercial" href="registro_centro_comercial.php"
                        style="width: 300px">
                        Registrar Centro Comercial
                    </a>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>
    </div>


    <?php
    // Incluye los modales y el pie de página
    include('modales_footer.php');
    ?>
    <br>
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
    <?php
    // Verifica si se ha enviado una solicitud para cambiar el rol de un usuario
    if(isset($_GET['cambiarRol']) && isset($_GET['idUsuario']) && isset($_GET['nuevoRol'])) {
        $idUsuario = $_GET['idUsuario'];
        $nuevoRol = $_GET['nuevoRol'];

        // Evita la inyección SQL usando sentencias preparadas
        $sqlCambiarRol = "UPDATE cuentas SET Rol = ? WHERE Id_Usuario = ?";
        $stmt = $conexion->prepare($sqlCambiarRol);

        // Vincula los parámetros y ejecuta la sentencia preparada
        $stmt->bind_param("si", $nuevoRol, $idUsuario);
        $stmt->execute();

        // Cierra la sentencia preparada
        $stmt->close();

        // Recargar la página para reflejar los cambios
        header('Location: admin.php');
        exit;
    }
    ?>
    <script>
        $(document).ready(function () {
            $("#modalparque").click(function () {
                $("#registrarparque").toggle();
            });

            // Repite el mismo patrón para los demás botones
            $("#modaldiscoteca").click(function () {
                $("#registrardiscoteca").toggle();
            });

            $("#modalestadio").click(function () {
                $("#registrarestadio").toggle();
            });

            $("#modalcentrocomercial").click(function () {
                $("#registrarcentrocomercial").toggle();
            });
        });
    </script>

    <script>
        function cambiarRolUsuario(idUsuario, rolActual) {
            var nuevoRol = prompt("Ingrese el nuevo rol para el usuario:", rolActual);
            if (nuevoRol !== null) {
                // Enviar el nuevo rol al servidor
                window.location.href = `admin.php?cambiarRol&idUsuario=${idUsuario}&nuevoRol=${encodeURIComponent(nuevoRol)}`;
            }
        }

    </script>
    <script>
        function mostrarImagenes(idEstablecimiento) {
            var imagenes = document.querySelectorAll('.imagen-container img');
            var imagenActual = 0;

            // Muestra la primera imagen y oculta las demás
            imagenes.forEach(function (imagen, index) {
                if (index === imagenActual) {
                    imagen.style.display = 'block';
                } else {
                    imagen.style.display = 'none';
                }
            });

            // Agrega flechas para navegar entre las imágenes
            var botonImagen = document.querySelector('.imagen-container button');
            botonImagen.insertAdjacentHTML('beforeend', '<span class="anterior" onclick="cambiarImagen(\'' + idEstablecimiento + '\', -1)">&#10094;</span>');
            botonImagen.insertAdjacentHTML('beforeend', '<span class="siguiente" onclick="cambiarImagen(\'' + idEstablecimiento + '\', 1)">&#10095;</span>');
        }

        function cambiarImagen(idEstablecimiento, n) {
            // Oculta todas las imágenes
            var imagenes = document.querySelectorAll('.imagen-container img');
            imagenes.forEach(function (imagen) {
                imagen.style.display = 'none';
            });

            // Calcula la nueva imagen a mostrar
            var imagenActual = (imagenActual + n + imagenes.length) % imagenes.length;

            // Muestra la nueva imagen
            imagenes[imagenActual].style.display = 'block';
        }
    </script>





    <script>
        function showImage(imagePath) {
            var modalImage = document.getElementById('modalImage');
            var modalTitle = document.getElementById('imageModalLabel');

            modalImage.src = imagePath;
            modalTitle.innerHTML = 'Visualizador de imagenes';

            $('#imageModal').modal('show');
        }
        function aprobarEstablecimiento(idEstablecimiento) {
            if (confirm("¿Estás seguro de que deseas aprobar este establecimiento?")) {
                window.location.href = "admin.php?aprobarEstablecimiento=" + idEstablecimiento;
            }
        }

        function eliminarEstablecimiento(idEstablecimiento) {
            if (confirm("¿Estás seguro de que deseas rechazar este establecimiento?")) {
                window.location.href = "admin.php?rechazarEstablecimiento=" + idEstablecimiento;
            }
        }

        function eliminarUsuario(idUsuario) {
            if (confirm("¿Estás seguro de que deseas eliminar este usuario?")) {
                window.location.href = "admin.php?eliminarUsuario=" + idUsuario;
            }
        }
    </script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>