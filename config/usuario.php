<?php

include_once('conexion.php');

try {
    if (isset($_SESSION['user_id'])) {
        if (isset($_SESSION['Email'])) {
            $user_email = $_SESSION['Email'];
            $sql = "SELECT Nombres FROM cuentas WHERE Email = '$user_email'";
        
            $result = mysqli_query($conexion, $sql);

            if (!$result) {
                throw new Exception('Error en la consulta SQL: ' . mysqli_error($conexion));
            }

            $row = mysqli_fetch_assoc($result);
            if (isset($row['Nombres'])) {
                $_SESSION['Nombres'] = $row['Nombres']; // Asignar el nombre de usuario a la sesión
            } else {
                throw new Exception('No se encontraron nombres en la base de datos.');
            }
        } else {
            throw new Exception('La variable de sesión $_SESSION["Email"] no está configurada.');
        }
    }
} catch (Exception $e) {
    echo 'Error: ' . $e->getMessage();
}

?>

