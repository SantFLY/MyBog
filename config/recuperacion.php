<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

include_once('./config/conexion.php');
$correoenviado = false;
$contraseñacambiada = false;
if($_SERVER['REQUEST_METHOD'] === 'POST') {
    if(isset($_POST['email'])) {
        $email = trim($_POST['email']);
        $sql = "SELECT Id_Usuario FROM cuentas WHERE Email = ?";
        $stmt = $conexion->prepare($sql);
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $stmt->store_result();

        if($stmt->num_rows > 0) {
            require './PHPMailer/src/Exception.php';
            require './PHPMailer/src/PHPMailer.php';
            require_once('./PHPMailer/src/SMTP.php');
            $mail = new PHPMailer(true);
            try {
                $mail->isSMTP();
                $mail->Host = 'smtp-mail.outlook.com';
                $mail->SMTPAuth = true;
                $mail->Username = 'MyBog2023@outlook.com';
                $mail->Password = 'Prueba159';
                $mail->Port = 587;
                $mail->CharSet = 'UTF-8';
                $mail->Encoding = 'base64';
                $mail->setFrom('MyBog2023@outlook.com', 'MyBog');
                $mail->addAddress($email);
                $verification_code = sprintf("%06d", mt_rand(1, 999999));
                $stmt->bind_result($user_id);
                $stmt->fetch();
                $sql_code = "INSERT INTO verification_codes (user_id, token) VALUES (?, ?)";
                $stmt_code = $conexion->prepare($sql_code);
                $stmt_code->bind_param("is", $user_id, $verification_code);
                $stmt_code->execute();
                $mail->isHTML(true);
                $mail->Subject = 'Código de Verificación';
                $mail->Body = '¡Hola!<br><br>¡Estamos a punto de darte acceso de nuevo! Para continuar, necesitamos confirmar que eres tú.<br><br>Tu código de verificación es: <strong>'.$verification_code.'</strong> <br><br> Por favor, utiliza este código para completar el proceso y restablecer tu contraseña.<br><br>Gracias por confiar en nosotros.<br><br>Saludos,<br>El Equipo de MyBog';
                $mail->send();
                $correoenviado = true;
                echo '<script> setTimeout(function(){ window.location.href = "./verificar_codigo.php?user_id='.$user_id.'"; }, 3000); </script>';
            } catch (Exception $e) {
                $correoenviado = false;
                echo "Error en el envío del correo: {$e->getMessage()}";
            }
        } else {
            $correoenviado = false;
        }
    } elseif(isset($_POST['password'])) {
        // Proceso de cambio de contraseña

        $password = $_POST['password'];
        $confirm_password = $_POST['confirm_password'];
        $user_id = $_POST['user_id']; // Obtener el ID de usuario desde el formulario

        // Verificar que las contraseñas coincidan
        if($password === $confirm_password) {
            // Hash de la nueva contraseña
            $new_password_hash = password_hash($password, PASSWORD_DEFAULT);

            // Actualizar la contraseña en la base de datos
            $update_sql = "UPDATE cuentas SET Password = ? WHERE Id_Usuario = ?";
            $stmt = $conexion->prepare($update_sql);
            $stmt->bind_param("si", $new_password_hash, $user_id);

            if($stmt->execute()) {
                $delete_code_sql = "DELETE FROM verification_codes WHERE user_id = ?";
                $stmt_delete = $conexion->prepare($delete_code_sql);
                $stmt_delete->bind_param("i", $user_id);
                $stmt_delete->execute();

                $contraseñacambiada = true;
                echo '<script> setTimeout(function(){ window.location.href = "./main.php?ContraseñaActualizada=true"; }, 0); </script>';
                exit();
            } else {
            }
        } else {
            echo '<script> setTimeout(function(){ window.location.href = "./change_password.php?user_id='.$user_id.'"; }, 0); </script>';

        }
    } else {
        // Redirigir a la página principal si se accede directamente a este archivo sin datos
        echo '<script> setTimeout(function(){ window.location.href = "./main.php"; }, 3000); </script>';
        exit();
    }
}
?>