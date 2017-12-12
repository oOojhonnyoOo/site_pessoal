<?php

require 'PHPMailer-5.2.26/PHPMailerAutoload.php';

$mail = new PHPMailer;
$mail->isSMTP();
$mail->SMTPDebug = 2;
$mail->Debugoutput = 'html';
$mail->Host = 'smtp.gmail.com';
$mail->Port = 587;
$mail->SMTPSecure = 'tls';
$mail->SMTPAuth = true;
$mail->Username = "joao.neto@informata.com.br";
$mail->Password = "123asd123asd";

$mail->setFrom('joao.neto@informata.com.br', 'Joao Neto');
$mail->addReplyTo('joao.neto@informata.com.br', 'joao neto');
$mail->addAddress($_GET['email'], 'teste 123');

$mail->Subject = 'PHPMailer GMail SMTP test';


$mail->msgHTML("<html>ola mundo</html>");

//Replace the plain text body with one created manually
//$mail->AltBody = 'This is a plain-text message body';

if (!$mail->send()) {
    echo "Mailer Error: " . $mail->ErrorInfo;
} else {
    echo "Message sent!";

}
