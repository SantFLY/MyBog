<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<?php 
require_once('./config/conexion.php');
if(!isset($_GET['id'])){
    echo "<script> alert('Id. de programa no definido.'); location.replace('./') </script>";
    $conexion->close();
    exit;
}

$delete = $conexion->query("DELETE FROM `schedule_list` where id = '{$_GET['id']}'");
if($delete){
        echo '<script> setTimeout(function(){ window.location.href = "./calendario.php"; }, 0); </script>';
}else{
    echo "<pre>";
    echo "An Error occured.<br>";
    echo "Error: ".$conexion->error."<br>";
    echo "SQL: ".$sql."<br>";
    echo "</pre>";
}
$conexion->close();

?>