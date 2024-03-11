<?php

$establecimientoregistrado = false;

try {
    if (isset($_SESSION['user_id']) && $_SERVER['REQUEST_METHOD'] == 'POST') {
        // Recoger datos del formulario
        $nombreEstablecimiento = isset($_POST['nombre_establecimiento']) ? $_POST['nombre_establecimiento'] : null;
        $localidad = $_POST['localidad'];
        $telefono = $_POST['telefono'];
        $nit = $_POST['nit'];
        $tipoEstablecimiento = $_POST['tipo_establecimiento'];
        $informacionAdicional = $_POST['informacion_adicional'];
        $tipoVia = $_POST['tipo_via'];
        $numeroVia = $_POST['numero'];
        $letra1 = $_POST['letra_1'];
        $bis = $_POST['bis'];
        $letra3 = $_POST['letra_3'];
        $direccionSurNorte = $_POST['direccion_sur_norte'];
        $numero2 = $_POST['numero_2'];
        $numero3 = $_POST['numero_3'];
        $direccionEsteOeste = $_POST['direccion_este_oeste'];
        $infoAdicionalDireccion = $_POST['info_adicional'];

        $direccionCompleta = $tipoVia . ' ' . $numeroVia . ' ' . $letra1 . ' ' . $bis . ' ' . $direccionSurNorte . ' # ' . $numero2 . ' ' . $letra3 . ' - ' . $numero3 . ' ' . $direccionEsteOeste . ' ' .$infoAdicionalDireccion;

        $sqlVerificarNit = "SELECT Id_registro FROM registro_de_establecimiento WHERE Nit = ?";
        $stmtVerificarNit = $conexion->prepare($sqlVerificarNit);
        $stmtVerificarNit->bind_param("s", $nit);
        $stmtVerificarNit->execute();
        $resultVerificarNit = $stmtVerificarNit->get_result();
        
        if ($resultVerificarNit->num_rows > 0) {
            echo '<script>setTimeout(function(){window.location.href = "reg_establecimiento.php?nitinvalido=true"; }, 0);  
            </script>';
        } else {
            // Archivos
            $archivos = $_FILES['photos']['name'];
            $carpeta_destino = './Imagenes/registro_de_establecimiento/';

            // Verificar si hay archivos antes de procesarlos
            if (!empty($archivos)) {
                // Insertar datos en la base de datos
                $sql = "INSERT INTO registro_de_establecimiento (Nombre_del_establecimiento, Direccion_de_establecimiento, Id_Usuario, Telefono, Informacion_adicional, Nit, localidad, tipo_de_establecimiento)
            VALUES (?, ?, ?, ?, ?, ?, ?, ?)";

                $stmt = $conexion->prepare($sql);
                $stmt->bind_param("ssisssss", $nombreEstablecimiento, $direccionCompleta, $_SESSION['user_id'], $telefono, $informacionAdicional, $nit, $localidad, $tipoEstablecimiento);

                if ($stmt->execute()) {
                    // Obtener el ID del establecimiento ecién insertado
                    $idEstablecimiento = $stmt->insert_id;

                    // Guardar información de las imágenes en la base de datos
                    foreach ($archivos as $key => $archivo) {
                        // Obtener la extensión del archivo
                        $extension = pathinfo($archivo, PATHINFO_EXTENSION);

                        // Construir el nuevo nombre de archivo
                        $nombre_archivo = $nombreEstablecimiento . $nit . ($key + 1) . '.' . $extension;

                        $archivo_temporal = $_FILES['photos']['tmp_name'][$key];
                        $ruta_destino = $carpeta_destino . $nombre_archivo;

                        move_uploaded_file($archivo_temporal, $ruta_destino);

                        // Insertar información de la imagen en la base de datos
                        $sqlImagen = "INSERT INTO imagenes_establecimiento (id_establecimiento, nombre_archivo, ruta_destino)
                        VALUES (?, ?, ?)";
                        $stmtImagen = $conexion->prepare($sqlImagen);
                        $stmtImagen->bind_param("iss", $idEstablecimiento, $nombre_archivo, $ruta_destino);
                        $stmtImagen->execute();
                    }

                    $establecimientoregistrado = true;

                    ?>
                    <script>
                        setTimeout(function () { 
                            window.location.href = "./mis_registros.php";
                        }, 0);
                    </script>
                    <?php
                    exit();
                } else {
                    throw new Exception("Error al registrar el establecimiento: " . $stmt->error);
                }
            } else {
                // Manejar la situación en la que no se proporcionaron archivos.
                echo "No se han proporcionado archivos para procesar.";
            }
        }

    } else {
        throw new Exception("Error: No hay datos para procesar o el usuario no está autenticado.");
    }
} catch (Exception $e) {
    header("refresh:1;url=./reg_establecimiento.php");
    exit;
}
?>