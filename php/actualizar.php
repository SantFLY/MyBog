<?php
include_once('../config/conexion.php');

if (!isset($_SESSION['id_usuario'])) {
    header('Location: ./main.php');
    exit;
}

try {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Recupera los datos enviados por POST
        $nuevoNombre = $_POST['nuevoNombre'];
        $nuevoApellido = $_POST['nuevoApellido'];
        $nuevoCorreo = $_POST['nuevoCorreo'];
        $nuevaContraseña = $_POST['nuevaContraseña'];  // Nuevo campo para la nueva contraseña
        $userId = $_SESSION['user_id'];

        // Realiza una consulta SQL para verificar si el nuevo correo ya existe en la base de datos
        $stmtVerificarCorreo = $conexion->prepare("SELECT id_usuario FROM cuentas WHERE email = ? AND id_usuario != ?");
        $stmtVerificarCorreo->bind_param('si', $nuevoCorreo, $userId);
        $stmtVerificarCorreo->execute();
        $stmtVerificarCorreo->store_result();

        if ($stmtVerificarCorreo->num_rows > 0) {
            // El nuevo correo ya existe en la base de datos, por lo que no se permite la actualización
            echo '<script>setTimeout(function() {window.location.href = "../main.php";}, 2000);</script>';
        } else {
            // El nuevo correo no existe, por lo que se puede realizar la actualización
            $stmtVerificarCorreo->close();

            // Realiza una consulta SQL para actualizar los datos en la base de datos
            $stmtActualizar = $conexion->prepare("UPDATE cuentas SET nombres = ?, apellidos = ?, email = ? WHERE id_usuario = ?");
            $stmtActualizar->bind_param('sssi', $nuevoNombre, $nuevoApellido, $nuevoCorreo, $userId);

            // Verifica si se proporciona una nueva contraseña y la actualiza en la base de datos
            if (!empty($nuevaContraseña)) {
                // Aplica la lógica para almacenar la nueva contraseña de manera segura en tu base de datos
                // Puedes utilizar funciones de hash como password_hash() para almacenarla de forma segura
                $hashNuevaContraseña = password_hash($nuevaContraseña, PASSWORD_DEFAULT);

                // Agrega la actualización de la contraseña a la consulta SQL
                $stmtActualizar = $conexion->prepare("UPDATE cuentas SET nombres = ?, apellidos = ?, email = ?, password = ? WHERE id_usuario = ?");
                $stmtActualizar->bind_param('ssssi', $nuevoNombre, $nuevoApellido, $nuevoCorreo, $hashNuevaContraseña, $userId);
            }

            if ($stmtActualizar->execute()) {
                // Actualización exitosa
                echo '<script>setTimeout(function() {window.location.href = "../main.php?datos_actualizados=true";}, 0);</script>';
                session_destroy();
            } else {
                // Error al ejecutar la consulta de actualización
                echo '<script>setTimeout(function() {window.location.href = "../main.php";}, 0);</script>';
            }
        }
    }
} catch (Exception $e) {
    header("refresh:1;url=../config/pagina_error.php");
}
?>