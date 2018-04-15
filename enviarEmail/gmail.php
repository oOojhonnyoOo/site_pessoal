<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';
echo "<pre>";
$mail = new PHPMailer;
$mail->isSMTP();

//Enable SMTP debugging
// 0 = off (for production use)
// 1 = client messages
// 2 = client and server messages
$mail->SMTPDebug = 0;

$mail->Host = 'smtp.gmail.com';
$mail->Port = 587;
$mail->SMTPSecure = 'tls';
$mail->SMTPAuth = true;
$mail->Username = "mundodosnerds.com.br@gmail.com";
$mail->Password = "123asd123asd";
$mail->setFrom('mundodosnerds.com.br@gmail.com', 'Joao Neto');
$mail->addReplyTo('mundodosnerds.com.br@gmail.com', 'Joao Neto');
$mail->addAddress('eu@joaonetoprogramador.com', 'Joao Neto');
$mail->Subject = 'titulo da mensagem';
$mail->msgHTML("minha mensagem");
$mail->AltBody = 'This is a plain-text message body';

if (!$mail->send()) {
    echo "Mailer Error: " . $mail->ErrorInfo;
} else {
    echo "Message sent!";
}
