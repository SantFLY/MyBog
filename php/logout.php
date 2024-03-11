<?php
session_start();

session_destroy();

echo '<script> setTimeout(function(){ window.location.href = "../main.php?cuentaCerrada=true"; }, 0); </script>';
exit;
?>
