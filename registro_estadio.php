<?php
include_once('./config/conexion.php');
if($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get form data
    $nombre_estadio = $_POST['nombre_estadio'];
    $ubicacion_estadio = $_POST['ubicacion_estadio'];
    $tipos_de_estadios = 1;  // The type of stadium is always 1
    $informacion_estadio = $_POST['informacion_estadio'];
    $localidad = $_POST['localidad'];
    $id_entretenimiento = $_POST['id_entretenimiento'];

    $archivos = $_FILES['photos']['name'];
    $carpeta_destino = 'Imagenes/estadios/';
    if(!empty($archivos)) {
        if(!is_dir($carpeta_destino)) {
            mkdir($carpeta_destino, 0755, true);
        }

        foreach($archivos as $key => $archivo) {
            // Obtain the file extension
            $extension = pathinfo($archivo, PATHINFO_EXTENSION);

            // Build the new file name (using only the name of the establishment)
            $nombre_archivo = $nombre_estadio.'.'.$extension;

            $archivo_temporal = $_FILES['photos']['tmp_name'][$key];
            $ruta_destino = $carpeta_destino.$nombre_archivo;

            move_uploaded_file($archivo_temporal, $ruta_destino);
        }
    }

    // Use a prepared statement to prevent SQL injection
    $sql = "INSERT INTO estadios (Nombres_de_estadios, Ubicacion_de_estadios, Tipos_de_estadios, Informacion_de_estadios, Id_entreteniemiento, localidad, nombre_imagen) 
        VALUES (?, ?, ?, ?, ?, ?, ?)";

    $stmt = $conexion->prepare($sql);

    if($stmt) {
        $stmt->bind_param("ssisiss", $nombre_estadio, $ubicacion_estadio, $tipos_de_estadios, $informacion_estadio, $id_entretenimiento, $localidad, $nombre_archivo);

        if($stmt->execute()) {
            echo "<script>setTimeout(function(){ window.location.href = './admin.php'; }, 3000);</script>";
        } else {
            echo "Error: ".$stmt->error;
        }

        // Close the statement
        $stmt->close();
    } else {
        echo "Error: ";
    }

    // Close the database connection
    mysqli_close($conexion);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Establecimiento</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/4.6.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="style/HeaderFooter.css">
    <link rel="stylesheet" type="text/css" href="style/Style_reg_establecimiento.css">
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

        <div class="container">
            <h2>Registro de Estadio</h2>
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <div class="login-box">
                        <form action="registro_estadio.php" method="post" enctype="multipart/form-data">
                            <div class="form-group" id="nombre_estadio">
                                <label for="nombre_estadio">Nombre del Estadio</label>
                                <input type="text" class="form-control" name="nombre_estadio" maxlength="250"
                                pattern="[^;]*" title="Ingresa el nombre del estadio (máximo 250 caracteres, no se permite el caracter ';')"
                                    required>
                            </div>

                            <div class="form-group" id="ubicacion_estadio">
                                <label for="ubicacion_estadio">Ubicación</label>
                                <input type="text" class="form-control" name="ubicacion_estadio" maxlength="250" pattern="[^;]*"
                                    title="Ubicación (máximo 250 caracteres, no se permite el caracter ';')">
                            </div>
                            <input type="hidden" id="tipos_estadio" name="tipos_estadio" value="1">


                            <div class="form-group" id="informacion_estadio">
                                <label for="informacion_estadio">Información del Estadio</label>
                                <textarea type="text" class="form-control" id="informacion_estadio"
                                    name="informacion_estadio" maxlength="250" pattern="[^;]*"
                                    title="Ingresa la descripción que quieres darle a tu estadio (máximo 250 caracteres, no se permite el caracter ';')"
                                    required></textarea>
                            </div>

                            <input type="hidden" name="id_entretenimiento" value="1">

                            <div class="form-group" id="localidad">
                                <label for="localidad">Localidad</label>
                                <select class="form-control" id="localidad" name="localidad"
                                    title="Selecciona la localidad en la que se ubica tu estadio" required>
                                    <option value="" disabled selected></option>
                                    <option value="Chapinero">Chapinero</option>
                                    <option value="Santa_Fe">Santa Fe</option>
                                    <option value="San_Cristobal">San Cristobal</option>
                                    <option value="Usme">Usmeo</option>
                                    <option value="Tunjuelito">Tunjuelito</option>
                                    <option value="Bosa">Bosa</option>
                                    <option value="Kennedy">Kennedy</option>
                                    <option value="Suba">Suba</option>
                                    <option value="Usaquén">Usaquén</option>
                                    <option value="Barrios_Unidos">Barrios Unidos</option>
                                    <option value="Teusaquillo">Teusaquillo</option>
                                    <option value="Los_Martires">Los Mártires</option>
                                    <option value="Puente_Aranda">Puente Aranda</option>
                                    <option value="La Candelaria">La Candelaria</option>
                                    <option value="Rafael_Uribe_Uribe">Rafael Uribe Uribe</option>
                                    <option value="Ciudad_Bolívar">Ciudad Bolívar</option>
                                    <option value="Sumapaz">Sumapaz</option>
                                </select>
                            </div>

                            <div class="form-group" id="labelfotos">
                                <label for="photos" class="labelfotos">Seleccionar Imágenes</label>
                            </div>

                            <div class="input-group mb-3">
                                <label for="photos" class="custom-file-label">.</label>
                                <input type="file" class="custom-file-input" id="photos" name="photos[]"
                                    accept="image/*" multiple required onchange="handleFileSelect(event)">
                                <div id="image-preview" class="image-preview"
                                    title="Selecciona las imágenes de tu estadio que quieres mostrar."></div>
                            </div>

                            <div class="thumbnail-container" id="thumbnail-container"></div>
                            <br>

                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Enviar Registro</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="imageModal" tabindex="-1" role="dialog" aria-labelledby="imageModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" id="imageModal1" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="imageModalLabel">Image Preview</h5>

                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <img id="modalImage" class="img-fluid" src="" alt="Image Preview">
                </div>
            </div>
        </div>
    </div>
    </div>
    <?php
    include('./modales_footer.php');
    ?>
    <footer class="footer">
        <nav>
            <ul>
                <li><a href="#" data-toggle="modal" data-target="#modalPoliticaPrivacidad">Política de
                        privacidad</a></li>
                <li><a href="#" data-toggle="modal" data-target="#modalTerminosCondiciones">Términos y
                        condiciones</a></li>
                <li><a href="#" data-toggle="modal" data-target="#modalContacto">Contacto</a></li>
            </ul>
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
                echo "Registro exitoso";
                ?>
            </strong>
            <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="toast-body">
            <?php
            echo "El estadio ha sido registrado correctamente";
            ?>
        </div>
    </div>

    <script>
        $(document).ready(function () {
            <?php
            if($_SERVER['REQUEST_METHOD'] === 'POST') {
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

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="./Funcionamiento_por_js/editar_usuario.js"></script>
    <script src=".Funcionamiento_por_js/reg_establecimiento.js"></script>
    <script>
        document.getElementById('photos').addEventListener('change', function (e) {
            var label = document.querySelector('.custom-file-label');
            var files = e.target.files;

            if (files.length > 1) {
                showToast('Solo se permiten un máximo de 1 imagen.');
                this.value = ''; // Limpiar la selección de archivos
                label.textContent = 'Selecciona 1 imagen';
                return;
            }

            // ...

            function showToast(message) {
                $('.toast-header strong').text('Demasiadas Imagenes');
                $('.toast-body').text(message);
                $(".toast").toast("show").css("display", "block");
                setTimeout(function () {
                    hideToast();
                }, 2000);
            }

            function hideToast() {
                $(".toast").toast("hide");
            }
            if (files.length > 1) {
                label.textContent = files.length + ' archivos seleccionados';
            } else {
                label.textContent = files[0].name;
            }

            function handleFileSelect(files) {
                var container = document.getElementById('thumbnail-container');
                var imagePreview = document.getElementById('image-preview');

                // Limpiar el contenedor de miniaturas
                container.innerHTML = '';

                // Limpiar la imagen de la vista previa
                imagePreview.innerHTML = '';

                // Verificar si hay archivos seleccionados
                if (files.length > 0) {
                    // Mostrar el contenedor de miniaturas
                    container.style.display = 'flex';

                    // Crear miniaturas y agregar al contenedor
                    for (var i = 0; i < files.length; i++) {
                        var thumbnail = document.createElement('img');
                        thumbnail.className = 'thumbnail';
                        thumbnail.src = URL.createObjectURL(files[i]);
                        thumbnail.addEventListener('click', function (event) {
                            toggleThumbnailSelection(event, files);
                        });
                        container.appendChild(thumbnail);
                    }

                    // Mostrar la imagen seleccionada en la vista previa
                    var thumbnails = document.querySelectorAll('.thumbnail');
                    thumbnails.forEach(function (thumbnail, index) {
                        thumbnail.addEventListener('click', function () {
                            openImageModal(files, index);
                        });
                    });
                }
            }

            // Function to open the image modal
            function openImageModal(files, index) {
                var modalImage = document.getElementById('modalImage');
                modalImage.src = URL.createObjectURL(files[index]);

                $('#imageModal').modal('show');
            }
            // Update the openImageModal function
            function openImageModal(files, index) {
                var modalImage = document.getElementById('modalImage');
                var modalTitle = document.getElementById('imageModalLabel');

                modalImage.src = URL.createObjectURL(files[index]);

                // Set the modal title to the name of the image
                var imageName = files[index].name;
                modalTitle.innerHTML = imageName;

                $('#imageModal').modal('show');
            } handleFileSelect(files);
        });


    </script>

    <style>
        .custom-file-label::after {
            content: "Buscar";
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


</body>

</html>