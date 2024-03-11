<?php
require_once('./config/conexion.php');

$eventoguardado = false;

if($_SERVER['REQUEST_METHOD'] != 'POST') {
    exit;
}

extract($_POST);

// Obtén el ID de usuario del usuario autenticado
$id_usuario = $_SESSION['user_id']; // Asegúrate de que esta variable se obtenga de manera adecuada

$allday = isset($allday);

// Validación de fechas
$hoy = date('Y-m-d'); // Fecha actual

if(strtotime($start_datetime) < strtotime($hoy)) {

    echo '<script> setTimeout(function(){ window.location.href = "./calendario.php?fechahoy=true";}, 0);</script>';
    exit;
}

if(strtotime($end_datetime) < strtotime($start_datetime)) {
    echo '<script> setTimeout(function(){ window.location.href = "./calendario.php?fechaainicio=true";}, 0);</script>';
    exit;
}
if(empty($id)) {
    // Utiliza consultas preparadas para prevenir inyecciones SQL
    $sql = "INSERT INTO `schedule_list` (`title`, `description`, `start_datetime`, `end_datetime`, `Id_usuario_for`) VALUES (?, ?, ?, ?, ?)";
    $stmt = $conexion->prepare($sql);
    $stmt->bind_param("ssssi", $title, $description, $start_datetime, $end_datetime, $id_usuario);
} else {
    $sql = "UPDATE `schedule_list` SET `title` = ?, `description` = ?, `start_datetime` = ?, `end_datetime` = ? WHERE `id` = ? AND `Id_usuario_for` = ?";
    $stmt = $conexion->prepare($sql);
    $stmt->bind_param("ssssii", $title, $description, $start_datetime, $end_datetime, $id, $id_usuario);
}

$save = $stmt->execute();

if($save) {
    $eventoguardado = true;
} else {
    echo "<pre>";
    echo "An Error occurred.<br>";
    echo "Error: ".$stmt->error."<br>";
    echo "SQL: ".$sql."<br>";
    echo "</pre>";
}

?>