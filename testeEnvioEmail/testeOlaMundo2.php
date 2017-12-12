<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'phpmailer/src/Exception.php';
require 'phpmailer/src/PHPMailer.php';
require 'phpmailer/src/SMTP.php';

$mail = new PHPMailer(true);                              
try {
    //Server settings
    $mail->SMTPDebug = 2;                                 
    $mail->isSMTP();                                      
    $mail->Host = 'aspmx.l.google.com';  
    $mail->SMTPAuth = true;                               
    $mail->Username = 'eujoaonetoprogramador@gmail.com';                 
    $mail->Password = '123asd123asd';                           
    $mail->SMTPSecure = 'tls';                            
    $mail->Port = 25;                                    

    //Recipients
    $mail->setFrom('eujoaonetoprogramador@gmail.com', 'Mailer');
    $mail->addAddress('eujoaonetoti@outlook.com', 'joao neto');     
    $mail->addReplyTo('eujoaonetoprogramador@gmail.com', 'Information');
    $mail->addCC('eujoaonetoprogramador@gmail.com');
    $mail->addBCC('eujoaonetoprogramador@gmail.com');

    //Attachments
    $mail->addAttachment('/var/tmp/file.tar.gz');         
    $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    

    //Content
    $mail->isHTML(true);                                  
    $mail->Subject = 'Here is the subject';
    $mail->Body    = 'This is the HTML message body <b>in bold!</b>';
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo 'Message could not be sent.';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
}