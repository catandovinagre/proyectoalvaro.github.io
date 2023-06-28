<?php
 
//librerias
  require 'PHPMailer-5.2-stable/PHPMailerAutoload.php';
 
//Create a new PHPMailer instance
$mail = new PHPMailer();
$mail->IsSMTP();
 
//Configuracion servidor mail
$mail->From = "melasudamelasudamelasuda999@gmail.com"; //remitente
$mail->SMTPAuth = true;
$mail->SMTPSecure = 'tls'; //seguridad
$mail->Host = "smtp.gmail.com"; // servidor smtp
$mail->Port = 587; //puerto
$mail->Username ='melasudamelasudamelasuda999@gmail.com'; //nombre usuario
$mail->Password = 'cfowvyrqndwgvmbk'; //contraseña
 
//Agregar destinatario
$mail->AddAddress($_POST['email']);
$mail->Subject = $_POST['subject'];
$mail->Body = $_POST['message'];

 
//Avisar si fue enviado o no y dirigir al index
if ($mail->Send()) {
    echo'<script type="text/javascript">
           alert("Comment sent successfully");
        </script>';
} else {
    echo'<script type="text/javascript">
           alert("Sorry, the comment could not be sent.");
        </script>';
}