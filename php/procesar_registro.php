<?php
$nombre = $_POST['Nombres'];
$apellido = $_POST['Apellidos'];
$email = $_POST['Email'];
$password = $_POST['Password'];

$registroExitoso = false;
$cuentaexistente = false;
try {
    // Verificar si el correo electrónico ya existe en la base de datos
    $sql_verificar_email = "SELECT * FROM cuentas WHERE Email = ?";
    $stmt_verificar_email = mysqli_prepare($conexion, $sql_verificar_email);
    mysqli_stmt_bind_param($stmt_verificar_email, "s", $email);
    mysqli_stmt_execute($stmt_verificar_email);
    $resultado_verificar = mysqli_stmt_get_result($stmt_verificar_email);

    if (mysqli_num_rows($resultado_verificar) > 0) {
        $cuentaexistente = true;
        throw new Exception("correo electrónico ya está registrado");
    }

    // Generar un hash seguro de la contraseña
    $hash = password_hash($password, PASSWORD_DEFAULT);

    // Insertar la nueva cuenta en la base de datos
    $sql_insertar = "INSERT INTO cuentas (Nombres, Apellidos, Email, Password, Id_servicios) VALUES (?, ?, ?, ?, '1')";
    $stmt_insertar = mysqli_prepare($conexion, $sql_insertar);
    mysqli_stmt_bind_param($stmt_insertar, "ssss", $nombre, $apellido, $email, $hash);

    if (mysqli_stmt_execute($stmt_insertar)) {
        $registroExitoso = true;
        echo '<script>setTimeout(function(){window.location.href = "./main.php";}, 1000);</script>';
    } else {
        throw new Exception("Error al insertar el registro en la base de datos: " . mysqli_error($conexion));
    }
} catch (Exception $e) {
    
} finally {
    // Cerrar la conexión solo si está abierta
    if ($conexion) {
        mysqli_close($conexion);
    }
}
?>