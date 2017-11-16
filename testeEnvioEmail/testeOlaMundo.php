<?php 

require 'vendor/autoload.php';

$from = new SendGrid\Email("Joao Neto", "joao.neto@informata.com.br");
$subject = "testando som 123 testando som";
$to = new SendGrid\Email("jean nascimento", "jean.rnascimento@gmail.com");
$content = new SendGrid\Content("text/plain", "testando som 123 testando som");

$mail = new SendGrid\Mail($from, $subject, $to, $content);
$sg = new \SendGrid("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");
$response = $sg->client->mail()->send()->post($mail);
echo $response->statusCode();
echo "<br>";
print_r($response->headers());
echo "<br>";
echo $response->body();

?>