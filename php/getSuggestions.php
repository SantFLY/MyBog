<?php
$q = $_POST['query'];

// Incluye el archivo de conexión a la base de datos
include_once('../config/conexion.php');

// Verifica si la conexión se estableció correctamente

$sql = "SELECT Nombres_de_centros_comerciales as nombre, 'centros_comerciales' as tabla FROM centros_comerciales WHERE Nombres_de_centros_comerciales LIKE '$q%'
        UNION
        SELECT Nombre_de_parques as nombre, 'parques' as tabla FROM parques WHERE Nombre_de_parques LIKE '$q%'
        UNION
        SELECT Nombres_de_discotecas as nombre, 'discotecas' as tabla FROM discotecas WHERE Nombres_de_discotecas LIKE '$q%'
        UNION
        SELECT Nombres_de_estadios as nombre, 'estadios' as tabla FROM estadios WHERE Nombres_de_estadios LIKE '$q%'";

$result = mysqli_query($conexion, $sql); // Utiliza mysqli_query y pasa $conn como primer parámetro

if ($result && mysqli_num_rows($result) > 0) {
    echo '<div class="list-group">';
   echo '<br>'; while ($row = mysqli_fetch_assoc($result)) {
        // Construye la URL de redirección con los parámetros necesarios
        $url = "resultado.php?tabla=" . $row['tabla'] . "&nombre=" . urlencode($row['nombre']);
        
        // Muestra la sugerencia utilizando Bootstrap
        echo '<a href="' . $url . '" class="list-group-item list-group-item-action">' . $row['nombre'] . '</a>';
    }
    echo '</div>';
} else {
    
    echo '<p class="text-muted">Sin resultados</p>';
}
?>
