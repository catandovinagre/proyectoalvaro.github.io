<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Obtener los datos del formulario
    $nombre = $_POST['nombre'];
    $mensaje = $_POST['mensaje'];

    // Configurar los detalles del correo electrónico
    $destinatario = 'melasudamelasudamelasuda999@gmail.com'; // Reemplaza con tu dirección de correo Gmail
    $asunto = "Comentarios de la página web de $nombre";
    $cuerpo = "Nombre: $nombre\n\nMensaje: $mensaje";

    // Enviar el correo electrónico utilizando PHPMailer
    require 'vendor/autoload.php'; // Carga la biblioteca PHPMailer

    $mail = new PHPMailer\PHPMailer\PHPMailer();
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->SMTPSecure = 'tls';
    $mail->Port = 587;
    $mail->Username = 'tu_correo@gmail.com';
    $mail->Password = 'tu_contraseña';

    $mail->setFrom('tu_correo@gmail.com', 'Tu Nombre');
    $mail->addAddress($destinatario);
    $mail->Subject = $asunto;
    $mail->Body = $cuerpo;

    // Configura la autenticación SMTP con OAuth 2.0
    $mail->oauthUserEmail = 'tu_correo@gmail.com';
    $mail->oauthClientId = 'tu_client_id';
    $mail->oauthClientSecret = 'tu_client_secret';
    $mail->oauthRefreshToken = 'tu_refresh_token';

    if ($mail->send()) {
        echo 'Gracias por el comentario.';
    } else {
        echo 'Lo sentimos, ha ocurrido un error al enviar el mensaje: ' . $mail->ErrorInfo;
    }
} else {
    header('Location: index.html');
    exit();
}
?>
