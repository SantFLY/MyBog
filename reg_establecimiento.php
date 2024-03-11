<?php
include_once('config/conexion.php');

$establecimientoregistrado = false;

if(!isset($_SESSION['user_id'])) {
    header('Location: ./main.php');
    exit();
}

if($_SERVER['REQUEST_METHOD'] === 'POST') {
    include_once('./php/procesar_registro_establecimiento.php');

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
            <h2>Registro de Establecimiento</h2>
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <div class="login-box">
                        <form action="reg_establecimiento.php" method="post" enctype="multipart/form-data">
                            <div class="form-group" name="nombre_establecimiento" id="nombre_establecimiento">
                                <label for="nombre_establecimiento">Nombre del Establecimiento</label>
                                <input type="text" class="form-control" name="nombre_establecimiento" maxlength="30"
                                    pattern=".*\S.*"
                                    title="Ingresa el nombre del establecimiento (máximo 30 caracteres)" required>
                            </div>
                            <div class="form-group">
                                <label for="localidad">Localidad</label>
                                <select class="form-control" id="localidad" name="localidad"
                                    title="Selecciona la localidad en la que se úbica tu establecimiento" required>
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
                                    <option value="Sumapaz">Sumapaz</option </select>
                                </select>
                            </div>
                            <div class="form-group" id="Direccion_de_establecimiento"
                                name="Direccion_de_establecimiento">
                                <label for="Direccion_de_establecimiento">Dirección</label>
                                <div class="row justify-content-center align-items-center" id="direccion_inputs">
                                    <div class="col-md-4 text-center" id="tipovia" name="tipovia">
                                        <label for="tipo_via">Tipo de vía</label>
                                        <select class="form-control" name="tipo_via" title="Selecciona el tipo de vía"
                                            required>
                                            <option value="" disabled selected></option>
                                            <option value="calle">Calle</option>
                                            <option value="carrera">Carrera</option>
                                            <option value="transversal">Transversal</option>
                                            <option value="diagonal">Diagonal</option>
                                        </select>
                                    </div>
                                    <div class="col-md-2 text-center" id="n1" name="n1">
                                        <label for="numero">n° vía</label>
                                        <input type="text" class="form-control" name="numero" minlength="1"
                                            maxlength="3" required pattern="[0-9]+"
                                            title="Ingresa solo números (máximo 3)">
                                    </div>
                                    <div class="col-md-2 text-center" id="letra1" name="letra1">
                                        <label for="letra_1">Letra</label>
                                        <select class="form-control" name="letra_1"
                                            title="Selecciona la letra de tu vía" required>
                                            <option value="_" selected></option>
                                            <option value="a">A</option>
                                            <option value="b">B</option>
                                            <option value="c">C</option>
                                            <option value="d">D</option>
                                            <option value="e">E</option>
                                            <option value="f">F</option>
                                        </select>
                                    </div>
                                    <div class="col-md-2 text-center" id="bis1" name="bis1">
                                        <label for="bis">Bis</label>
                                        <select class="form-control" name="bis"
                                            title="Selecciona si tu dirección tiene bis" required>
                                            <option value="_" selected></option>
                                            <option value="bis">Bis</option>
                                        </select>
                                    </div>
                                    <div class="col-md-3 text-center" id="SON" name="SON">
                                        <label for="direccion_sur_norte">Sur o Norte</label>
                                        <select class="form-control" name="direccion_sur_norte"
                                            title="Selecciona si tu dirección tiene sur o norte" required>
                                            <option value="_" selected></option>
                                            <option value="sur">Sur</option>
                                            <option value="norte">Norte</option>
                                        </select>
                                    </div>
                                    <label for="">#</label>
                                    <div class="col-md-2 text-center" id="n2" name="n2">
                                        <label for="numero_2">n°1</label>
                                        <input type="text" class="form-control" name="numero_2" minlength="1"
                                            maxlength="3" required pattern="[0-9]+"
                                            title="Ingresa solo números (máximo 3)">
                                    </div>
                                    <div class="col-md-2 text-center" id="letra3" name="letra3">
                                        <label for="letra_3">Letra</label>
                                        <select class="form-control" name="letra_3"
                                            title="Selecciona la letra de tu vía" required>
                                            <option value="_" selected></option>
                                            <option value="a">A</option>
                                            <option value="b">B</option>
                                            <option value="c">C</option>
                                            <option value="d">D</option>
                                            <option value="e">E</option>
                                            <option value="f">F</option>
                                        </select>
                                    </div>
                                    <label for="">-</label>
                                    <div class="col-md-2 text-center" id="n3" name="n3">
                                        <label for="numero_3">n°2</label>
                                        <input type="text" class="form-control" name="numero_3" minlength="1"
                                            maxlength="3" required pattern="[0-9]+"
                                            title="Ingresa solo números (máximo 3)">
                                    </div>
                                    <div class="col-md-3 text-center" id="EOO" name="EOO">
                                        <label for="direccion_este_oeste">Este - Oeste</label>
                                        <select class="form-control" name="direccion_este_oeste"
                                            title="Selecciona si tu dirección tiene este/oeste" required>
                                            <option value="_" selected></option>
                                            <option value="este">Este</option>
                                            <option value="oeste">Oeste</option>
                                        </select>
                                    </div>
                                    <div class="col-md-12" id="info" name="info">
                                        <label for="info_adicional">Información Adicional de Dirección</label>
                                        <textarea type="text" class="form-control" name="info_adicional" maxlength="30"
                                            title="Si tu dirección tiene datos adicionales, ingresalos aquí. (max 30 carácteres)"></textarea>
                                    </div>

                                </div>
                            </div>
                            <div class="form-group" id="telefono1" name="telefono1">
                                <label for="telefono">Teléfono</label>
                                <input type="tel" class="form-control" name="telefono" maxlength="10" minlength="10"
                                    pattern="[0-9]+" title="Ingresa tu número de telefono, sin simbolos ni letras"
                                    required>
                            </div>
                            <div class="form-group" id="infoadd" name="infoadd">
                                <label for="informacion_adicional">Información Adicional</label>
                                <textarea type="text" class="form-control" id="informacion_adicional"
                                    name="informacion_adicional" maxlength="250"
                                    title="Ingresa la descripción que quieres darle a tu lugar (max 250 carácteres)"
                                    required></textarea>
                            </div>
                            <div class="form-group" id="nit1" name="nit1">
                                <label for="nit">NIT</label>
                                <input type="text" class="form-control" name="nit" pattern="[0-9]{9}|[0-9]{11}"
                                    title="Ingresa 9 dígitos (persona natural) o 11 dígitos (persona jurídica)"
                                    required>
                            </div>

                            <div class="form-group" id="tipo_est" name="nit">
                                <label for="tipo_establecimiento">Tipo de Establecimiento</label>
                                <select class="form-control" name="tipo_establecimiento"
                                    title="Selecciona que tipo de establecimiento tienes." required>
                                    <option value="" disabled selected></option>
                                    <option value="Discoteca">Discoteca</option>
                                    <option value="Centro_Comercial">Centro Comercial</option>
                                    <option value="Parque">Parque</option>
                                    <option value="Hospedaje">Hospedaje</option>
                                </select>
                            </div>
                            <div class="form-group" id="labelfotos" name="labelfotos">
                                <label for="photos" class="labelfotos">
                                    Seleccionar Imagenes
                                </label>
                            </div>
                            <div class="input-group mb-3">
                                <label for="photos" class="custom-file-label"
                                    title="Selecciona las imágenes de tu establecimiento que quieres mostrar."></label>
                                <input type="file" class="custom-file-input" id="photos" name="photos[]"
                                    accept="image/*" multiple required onchange="handleFileSelect(event)">
                                <div id="image-preview" class="image-preview"></div>
                            </div>
                            <div class="thumbnail-container" id="thumbnail-container"></div>
                            <br>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Enviar Registro</button>
                            </div>
                        </form>
                    </div>
                </div>
                <div>
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
                    if(isset($_GET['nitinvalido']) && $_GET['nitinvalido'] == 'true') {
                        echo "Nit Invalido";
                    }
                    ?>
                </strong>
                <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="toast-body">
                <?php
                if(isset($_GET['nitinvalido']) && $_GET['nitinvalido'] == 'true') {
                    echo "Este nit le pertenece a otro local    .";
                }
                ?>
            </div>
        </div>
        <script>
            $(document).ready(function () {
                <?php
                if(isset($_GET['nitinvalido']) && $_GET['nitinvalido'] == 'true') {
                    echo '$(".toast:eq(0)").toast("show").css("display", "block");';
                    echo 'setTimeout(function() { hideToast(); }, 3000);';
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
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
        <script src="./Funcionamiento_por_js/editar_usuario.js"></script>
        <script src=".Funcionamiento_por_js/reg_establecimiento.js"></script>
        <script>
            document.getElementById('photos').addEventListener('change', function (e) {
                var label = document.querySelector('.custom-file-label');
                var files = e.target.files;

                if (files.length > 10) {
                    showToast('Solo se permiten un máximo de 10 imágenes.');
                    this.value = ''; // Limpiar la selección de archivos
                    label.textContent = 'Selecciona hasta 10 imágenes';
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
<style>
    body {
        margin: 0;
        padding: 0;
        font-family: sans-serif;
        background-color: #ffffff;
    }

    .container {
        margin-top: 30px;

    }

    @media (max-width: 1200px) {
        .container {
            padding-bottom: 150px;
        }
    }

    .login-box .form-group {
        position: relative;
    }

    .login-box .form-control {
        width: 100%;
        padding: 8px;
        font-size: 16px;
        color: #000000;
        margin-bottom: 30px;
        border: 2px solid #cacaca;
        border-radius: 10px;
        outline: none;
        background-color: #f5f5f5;
        transition: 0.3s;
    }

    .login-box .form-control:focus {
        border: 2px solid #ff0000;
    }

    .login-box .form-control:valid {
        border: 2px solid #cacaca;
    }

    .login-box .form-group label {
        position: relative;
        top: 0px;
        left: 0px;
        color: #575757;
        font-size: 16px;
        transition: 0.3s;
        pointer-events: none;
    }

    #direccion_inputs {
        margin-left: auto;
        margin-right: auto;
        width: 99%;
        padding: 8px;
        font-size: 16px;
        color: #000000;
        margin-bottom: 30px;
        border: 2px solid #cacaca;
        border-radius: 10px;
        outline: none;
        transition: 0.3s;
    }

    .custom-file-input {
        display: none;
    }

    .custom-file-label {
        background-color: #f5f5f5;
        color: black;
        border: 2px solid #cacaca;
        padding: 8px 12px;
        border-radius: 10px;
        cursor: pointer;
        display: inline-block;
    }

    .labelfotos {
        display: block;
    }

    .btn {
        width: 30%;
        display: block;
        padding: 7px 10px;
        border-radius: 5px;
        color: #3c3c3c;
        text-decoration: none;
        overflow: hidden;
        transition: .5s;
        background-color: transparent;
        border: none;
        cursor: pointer;
        border-bottom: solid 1px rgba(255, 0, 0, 0.6);
        background-color: rgba(255, 0, 0, 0.1);
        box-shadow: 0 0 2px #ff0000, 0 0 2px #ff0000, 0 0 2px #ff0202, 0 0 0px #ff0000
    }

    .btn:hover {
        text-decoration: none;
        background: rgba(255, 0, 0, 0.4);
        color: black;
        border-radius: 5px;
        box-shadow: 0 0 2px #ff0000, 0 0 4px #ff0000, 0 0 6px #ff0202, 0 0 8px #ff0000;
    }

    .thumbnail-container {
        display: none;
        justify-content: center;
        align-items: center;
        flex-wrap: wrap;
        margin-top: 40px;
        border: 2px solid #cacaca;
        padding: 10px 10px 0px 10px;
        border-radius: 10px;
    }


    .thumbnail {
        border: 2px solid #cacaca;
        width: 100px;
        height: 100px;
        object-fit: cover;
        border-radius: 10px;
        margin-right: 10px;
        margin-bottom: 10px;
        cursor: pointer;
        transition: border 0.3s ease;
    }

    .thumbnail:hover {
        border: 2px solid #FFFB00;
    }

    .thumbnail.selected {
        border: 2px solid #ff0000;

    }


    .custom-file-input {
        display: none;
    }

    .custom-file-label {
        background-color: #f5f5f5;
        color: black;
        border: 2px solid #cacaca;
        padding: 8px 12px;
        border-radius: 10px;
        cursor: pointer;
        display: inline-block;
    }

    .labelfotos {
        display: block;
    }

    .btn {
        width: 30%;
        display: block;
        margin: 40px auto;
        padding: 7px 10px;
        border-radius: 5px;
        color: #3c3c3c;
        text-decoration: none;
        overflow: hidden;
        transition: .5s;
        background-color: transparent;
        border: none;
        cursor: pointer;
        border-bottom: solid 1px rgba(255, 0, 0, 0.6);
        background-color: rgba(255, 0, 0, 0.1);
        box-shadow: 0 0 2px #ff0000, 0 0 2px #ff0000, 0 0 2px #ff0202, 0 0 0px #ff0000
    }

    .btn:hover {
        text-decoration: none;
        background: rgba(255, 0, 0, 0.4);
        color: black;
        border-radius: 5px;
        box-shadow: 0 0 2px #ff0000, 0 0 4px #ff0000, 0 0 6px #ff0202, 0 0 8px #ff0000;
    }

    #image-preview {
        display: none;
    }

    #imageModal1 .modal-body {
        text-align: center;
    }

    #modalImage {
        max-height: 400px;
        height: auto;
        margin: 0 auto;
    }

    #imageModal1 .modal-content {
        background-color: white
    }

    #imageModal1 .modal-header {
        text-align: center;
        color: #3c3c3c;
    }

    #imageModal1 .modal-body {
        text-align: center;
        padding: 20px;
    }


    h2 {
        margin: 0;
        padding: 0;
        color: #f2163e;
        text-align: center;
        margin-bottom: 60px;
    }

    .custom-file-label::after {
        content: "Buscar";
    }
</style>