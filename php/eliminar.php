<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<?php
include_once('../config/conexion.php');
$cuentaeliminada = false;
try {
  if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_SESSION["user_id"])) {
    $usuarioId = $_SESSION["user_id"];

    // Eliminar registros relacionados en la tabla 'registro_de_establecimiento'
    $sqlEliminarRegistro = "DELETE FROM registro_de_establecimiento WHERE Id_Usuario = ?";
    $stmtEliminarRegistro = $conexion->prepare($sqlEliminarRegistro);
    $stmtEliminarRegistro->bind_param("i", $usuarioId);
    $stmtEliminarRegistro->execute();
    $stmtEliminarRegistro->close();

    // Eliminar la cuenta de usuario en la tabla 'cuentas'
    $sqlEliminarCuenta = "DELETE FROM cuentas WHERE Id_Usuario = ?";
    $stmtEliminarCuenta = $conexion->prepare($sqlEliminarCuenta);
    $stmtEliminarCuenta->bind_param("i", $usuarioId);

    if ($stmtEliminarCuenta->execute()) {
      session_destroy();
      $cuentaeliminada = true;
      echo '<script> setTimeout(function(){ window.location.href = "../main.php?cuentaEliminada=true"; }, 0); </script>';

      exit();
    } else {
      $cuentaeliminada = false;
      throw new Exception();
    }

  } else {
    throw new Exception();
  }
} catch (Exception $e) {
  echo '<script>setTimeout(function() {window.location.href = "../main.php";}, 0);</script>';
}

?>