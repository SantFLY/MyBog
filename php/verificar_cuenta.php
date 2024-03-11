<?php
require_once('./config/conexion.php');

if (isset($_GET['email']) && isset($_GET['token'])) {
    $email = $_GET['email'];
    $token = $_GET['token'];

    $verificationSQL = "SELECT * FROM cuentas WHERE Email = ? AND verification_token = ?";
    $stmtVerification = mysqli_prepare($conexion, $verificationSQL);
    mysqli_stmt_bind_param($stmtVerification, "ss", $email, $token);
    mysqli_stmt_execute($stmtVerification);
    $resultVerification = mysqli_stmt_get_result($stmtVerification);

    if ($resultVerification && mysqli_num_rows($resultVerification) > 0) {
        $updateVerificationSQL = "UPDATE cuentas SET is_verified = 1, verification_token = NULL WHERE Email = ?";
        $stmtUpdateVerification = mysqli_prepare($conexion, $updateVerificationSQL);
        mysqli_stmt_bind_param($stmtUpdateVerification, "s", $email);
        mysqli_stmt_execute($stmtUpdateVerification);

        echo '<div class="alert alert-success" role="alert">¡Tu cuenta ha sido verificada! Puedes iniciar sesión.</div>';
    } else {
        echo '<div class="alert alert-danger" role="alert">No se pudo verificar la cuenta. Verifica la URL o intenta registrarte nuevamente.</div>';
    }
} else {
    echo '<div class="alert alert-danger" role="alert">Parámetros faltantes en la URL. Verifica la URL e intenta nuevamente.</div>';
}
?>
