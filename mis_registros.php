<?php
include_once('config/conexion.php');

if (!isset($_SESSION['user_id'])) {
    header('Location: main.php');
    exit;
}

$userId = $_SESSION['user_id'];

if (isset($_POST['registro_id'])) {
    $registroId = $_POST['registro_id'];

    // Obtener la información de la imagen antes de eliminar el registro de la base de datos
    $sqlObtenerImagen = "SELECT * FROM imagenes_establecimiento WHERE id_establecimiento = ?";
    $stmtObtenerImagen = $conexion->prepare($sqlObtenerImagen);
    $stmtObtenerImagen->bind_param("i", $registroId);
    $stmtObtenerImagen->execute();
    $resultImagen = $stmtObtenerImagen->get_result();
    $imagen = $resultImagen->fetch_assoc();

    // Eliminar la imagen del sistema de archivos si existe
    if ($imagen) {
        $rutaArchivo = 'php/Imagen_guardar/' . $imagen['nombre_archivo'];
        if (file_exists($rutaArchivo)) {
            unlink($rutaArchivo);
        }
    }

    // Eliminar el registro específico en la tabla 'registro_de_establecimiento'
    $sqlEliminarRegistro = "DELETE FROM registro_de_establecimiento WHERE Id_Usuario = ? AND Id_registro = ?";
    $stmtEliminarRegistro = $conexion->prepare($sqlEliminarRegistro);
    $stmtEliminarRegistro->bind_param("ii", $usuarioId, $registroId);
    $stmtEliminarRegistro->execute();
    $stmtEliminarRegistro->close();
}


if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_SESSION["user_id"])) {
    $usuarioId = $_SESSION["user_id"];

    if (isset($_POST['registro_id'])) {
        $registroId = $_POST['registro_id'];

        // Eliminar el registro específico en la tabla 'registro_de_establecimiento'
        $sqlEliminarRegistro = "DELETE FROM registro_de_establecimiento WHERE Id_Usuario = ? AND Id_registro = ?";
        $stmtEliminarRegistro = $conexion->prepare($sqlEliminarRegistro);
        $stmtEliminarRegistro->bind_param("ii", $usuarioId, $registroId);
        $stmtEliminarRegistro->execute();
        $stmtEliminarRegistro->close();
    }
}

$sql = "SELECT * FROM registro_de_establecimiento WHERE Id_Usuario = ?";
$stmt = $conexion->prepare($sql);
$stmt->bind_param("i", $userId);
$stmt->execute();
$result = $stmt->get_result();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mis Registros de Establecimientos</title>
    <!-- Agrega los enlaces a las bibliotecas de Bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="style/HeaderFooter.css">
    <link rel="stylesheet" type="text/css" href="style/mis_registros.css">
    <style>
        .table img {
            max-width: 80px;
            height: 80px;
            object-fit: cover;
        }

        .table td,
        .table th {
            vertical-align: middle;
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
                        if (isset($_SESSION['user_id'])) {
                            echo '<li class="nav-item">
                    <a class="nav-link amarillo" id="calendario" href="./reg_establecimiento.php">Registra tu establecimiento</a>
                    </li>';
                        } else {
                            echo '';
                        }
                        include('./modales_usuario.php');
                        ?>
                    </ul>
                </div>
            </div>
        </nav>
        <div class="contenedor">
            <h1 class="mb-4">Mis Registros de Establecimientos</h1>

            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>Dirección</th>
                            <th>Teléfono</th>
                            <th>Información</th>
                            <th>NIT</th>
                            <th>Localidad</th>
                            <th>Tipo</th>
                            <th>Imagen</th>
                            <th>Aprobado</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while ($row = $result->fetch_assoc()) { ?>
                            <tr>
                                <td>
                                    <?php echo $row['Nombre_del_establecimiento']; ?>
                                </td>
                                <td>
                                    <?php echo str_replace(['_'], ' ', $row['Direccion_de_establecimiento']); ?>
                                </td>

                                <td>
                                    <?php echo $row['Telefono']; ?>
                                </td>
                                <td>
                                    <?php echo $row['Informacion_adicional']; ?>
                                </td>
                                <td>
                                    <?php echo $row['Nit']; ?>
                                </td>
                                <td>
                                    <?php echo str_replace(['_'], ' ', $row['localidad']); ?>
                                </td>
                                <td>
                                    <?php echo $row['tipo_de_establecimiento']; ?>
                                </td>
                                <td>
                                    <?php
                                    // Obtener la información de la imagen para el establecimiento actual
                                    $sqlImagen = "SELECT * FROM imagenes_establecimiento WHERE id_establecimiento = ?";
                                    $stmtImagen = $conexion->prepare($sqlImagen);
                                    $stmtImagen->bind_param("i", $row['Id_registro']);
                                    $stmtImagen->execute();
                                    $resultImagen = $stmtImagen->get_result();
                                    $imagen = $resultImagen->fetch_assoc();

                                    if ($imagen) {
                                        // Mostrar la imagen si existe 
                                        echo '<img src="Imagenes/registro_de_establecimiento/' . $imagen['nombre_archivo'] . '" alt="Imagen">';
                                    } else {
                                        // Mostrar un mensaje si no hay imagen
                                        echo 'Sin imagen';
                                    }
                                    ?>
                                </td>
                                <td>
                                    <?php echo ($row['Aprobado'] == 1) ? 'Aprobado' : 'Pendiente'; ?>
                                </td>
                                <td>
                                    <form method="post" action="" class="registros">
                                        <a href="editar_establecimiento.php?id=<?php echo $row['Id_registro']; ?>"
                                            class="yellow1">Editar</a>
                                        <button type="button" class="red1" data-toggle="modal"
                                            data-target="#confirmaEliminarModal"
                                            data-id="<?php echo $row['Id_registro']; ?>">
                                            Borrar
                                        </button>

                                    </form>
                                </td>

                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <br><br><br><br><br><br><br><br><br><br><br><br>
    <?php
    include('modales_footer.php');

    ?>
    <footer class="footer mt-auto">
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
</body>

</html>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script>
    // Añade un evento antes de que se muestre el modal
    $('#confirmaEliminarModal').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget); // Botón que activó el modal
        var registroId = button.data('id'); // Extrae el valor del atributo data-id

        // Actualiza el valor del input en el formulario con el ID del establecimiento
        $('#registroIdInput').val(registroId);
    });
</script>
<style>
    .contenedor{
        margin-top: 50px;
        margin-right: auto;
        margin-left: auto;
        max-width: max-content;
    }
</style>