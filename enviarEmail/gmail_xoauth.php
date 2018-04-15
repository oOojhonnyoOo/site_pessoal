<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\OAuth;
use League\OAuth2\Client\Provider\Google;

date_default_timezone_set('Etc/UTC');

require 'vendor/autoload.php';

$mail = new PHPMailer;
$mail->isSMTP();
$mail->SMTPDebug= 0;
$mail->Host     = 'smtp.gmail.com';
$mail->Port     = 587;
$mail->SMTPSecure = 'tls';
$mail->SMTPAuth = true;
$mail->AuthType = 'XOAUTH2';
$email          = 'mundodosnerds.com.br@gmail.com';
$clientId       = '667627436910-509qu3a30recp5o4dbjbfc0e7sho0kid.apps.googleusercontent.com';
$clientSecret   = '8OgtfWNBhlGtp-RWVegk77_R';
$refreshToken   = 'ya29.GlueBUm66Uki_i1EXwl1LdxsQR3ZZMGIJdNSd0s1khFBn6XTELk5KiNPmAxrU6PS5v-YSj92xVMNpIWYtO53EzJWvb1YHBoEdGkll8YJ0_s2UOHjefmlMBMmoRVM';

$provider = new Google(
    [
        'clientId' => $clientId,
        'clientSecret' => $clientSecret,
    ]
);

//Pass the OAuth provider instance to PHPMailer
$mail->setOAuth(
    new OAuth(
        [
            'provider' => $provider,
            'clientId' => $clientId,
            'clientSecret' => $clientSecret,
            'refreshToken' => $refreshToken,
            'userName' => $email,
        ]
    )
);

$mail->setFrom($email, 'Joao Neto server');

$mail->addAddress('eu@joaonetoprogramador.com', 'Joao Neto client');
$mail->Subject = 'Enviando email com o phpmailer autenticado';
$mail->CharSet = 'utf-8';
$mail->msgHTML("Minha mensagem");
$mail->AltBody = 'This is a plain-text message body';

if (!$mail->send()) {
    echo "Mailer Error: " . $mail->ErrorInfo;
} else {
    echo "Message sent!";
}
