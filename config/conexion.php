<?php
session_start();
require_once __DIR__ . '/../vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

try {
    // Conexión a la base de datos
    $host = $_ENV['DB_HOST'];
    $user = $_ENV['DB_USER']; // Utilizando las credenciales del nuevo usuario 'mybog_user'
    $password = $_ENV['DB_PASSWORD'];
    $database = $_ENV['DB_NAME'];
    $port = $_ENV['DB_PORT'];

    $conexion = mysqli_connect($host, $user, $password, $database, $port);

    if (!$conexion) {
        throw new Exception("Error de conexión: " . mysqli_connect_error());
    }
} catch (Exception $e) {
    $mensajeError = "Lo sentimos, estamos experimentando problemas técnicos. Por favor, inténtalo de nuevo más tarde.";
    error_log("Error de conexión a la base de datos: " . $e->getMessage());
    header("Location: config/pagina_error.php");
}
?>
