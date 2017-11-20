<?php 

// CABEÇALHO SERVIDOR EMAIL
$headers  = 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
$headers .= 'To: João Neto eu@joaonetoprogramador.com' . "\r\n";
$headers .= 'From: João Neto <eu@joaonetoprogramador.com>' . "\r\n";
$headers .= 'Cc: eu@joaonetoprogramador.com' . "\r\n";
$headers .= 'Bcc: eu@joaonetoprogramador.com' . "\r\n";


$tituloClient  = " Olá obrigado por entrar em contato";
$messageClient = "Olá ".$_POST['nome']." obrigado por entrar em contato comigo lhe responderei o mais breve possivel... <br> João Neto <br> <a href='http://www.joaonetoprogramador.com' target='_blank'>http://www.joaonetoprogramador.com</a>";

$tituloMe  = "Uma pessoa entrou em contato com voce";
$messageMe = "Faaaaala fiote... uma pessoa entrou em contato com voce atravez do site... <br> 
			  nome: ".$_POST['nome']."<br>
			  email: ".$_POST['email']."<br>
			  menssagem: ".$_POST['mensagem'];

$returnClient = mail($_POST['email'], $tituloClient, $messageClient, $headers);
$returnMe = mail("eu@joaonetoprogramador.com", $tituloMe, $messageMe, $headers);

?>