<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<?php

$loginExitoso = false;
$credencialesIncorrectas = false;
$cuentaInexistente = false;
$contrasenaIncorrecta = false;

try {
    $email = trim($_POST['Email']);
    $password = trim($_POST['Password']);

    if (!$conexion) {
        throw new Exception("La conexión a la base de datos falló: " . mysqli_connect_error());
    }

    // Buscar el hash almacenado en la base de datos para el correo proporcionado
    $rolPredeterminado = 'Usuario';
    $sql = "SELECT * FROM cuentas WHERE Email = '$email'";
    $resultado = mysqli_query($conexion, $sql);

    if ($fila = mysqli_fetch_assoc($resultado)) {
        $hashAlmacenado = $fila['Password'];

        // Obtener los datos del usuario
        $nombresDelUsuario = $fila['Nombres'];
        $apellidosDelUsuario = $fila['Apellidos'];
        $emailDelUsuario = $fila['Email'];

        // Verificar la contraseña utilizando password_verify()
        if (password_verify($password, $hashAlmacenado)) {
            // Aquí se configura correctamente el id_usuario
            $id_usuario = $fila['Id_Usuario'];
            $_SESSION['user_id'] = $id_usuario;
            $_SESSION['id_usuario'] = $id_usuario;
            // Aquí configura el ID de usuario
            $_SESSION['nombres'] = $nombresDelUsuario;
            $_SESSION['apellidos'] = $apellidosDelUsuario;
            $_SESSION['email'] = $emailDelUsuario;
            $_SESSION['rol'] = $fila['Rol'];

            $loginExitoso = true;
            echo '<script> setTimeout(function(){ window.location.href = "index.php"; }, 2000); </script>';
        } else {
            // Contraseña incorrecta
            $contrasenaIncorrecta = true;
            throw new Exception("Contraseña incorrecta");
        }
    } else {
        // Usuario no encontrado
        $cuentaInexistente = true;
        throw new Exception("Cuenta inexistente");
    }
} catch (Exception $e) {
}
?>