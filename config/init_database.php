<?php
// Incluye el archivo de configuración y conexión a la base de datos
require_once 'conexion.php';

// Lee el contenido del archivo SQL
$sqlScriptFilePath = __DIR__ . '/mybog.sql'; // Ajusta la ruta según sea necesario
$sqlScript = file_get_contents($sqlScriptFilePath);

// Ejecuta el script
$conexion->multi_query($sqlScript);
?>
