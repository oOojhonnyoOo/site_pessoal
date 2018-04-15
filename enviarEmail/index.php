<?php
namespace PHPMailer\PHPMailer;

use League\OAuth2\Client\Provider\Google;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\OAuth;

session_start();

if (!isset($_GET['code']) && !isset($_GET['provider'])) {
?>
<html>
<body>Select Provider:<br/>
<a href='?provider=Google'>Google</a><br/>
</body>
</html>
<?php
exit;
}

require 'vendor/autoload.php';

$providerName = '';

if (array_key_exists('provider', $_GET)) {
    $providerName = $_GET['provider'];
    $_SESSION['provider'] = $providerName;
} elseif (array_key_exists('provider', $_SESSION)) {
    $providerName = $_SESSION['provider'];
}

if (!in_array($providerName, ['Google', 'Microsoft', 'Yahoo'])) {
    exit('Only Google, Microsoft and Yahoo OAuth2 providers are currently supported in this script.');
}

//These details are obtained by setting up an app in the Google developer console,
//or whichever provider you're using.
$clientId = '1090055442929-56p8nqguc87gs5068o22dv7d6bc9i5nu.apps.googleusercontent.com';
$clientSecret = 'FlKdJXlhf2po5nV2G6O-bHo6';

//If this automatic URL doesn't work, set it yourself manually to the URL of this script
$redirectUri = (isset($_SERVER['HTTPS']) ? 'https://' : 'http://') . $_SERVER['HTTP_HOST'] . $_SERVER['PHP_SELF'];


$params = [
    'clientId' => $clientId,
    'clientSecret' => $clientSecret,
    'redirectUri' => $redirectUri
];

$options = [];
$provider = null;


switch ($providerName) {
    case 'Google':
        $provider = new Google($params);
        $options = [
            'scope' => [
                'https://www.googleapis.com/auth/gmail.compose'
            ]
        ];
        break;
}

if (null === $provider) {
    exit('Provider missing');
}


if (!isset($_GET['code'])) {
    // If we don't have an authorization code then get one
    $authUrl = $provider->getAuthorizationUrl($options);
    $_SESSION['oauth2state'] = $provider->getState();
    header('Location: '.$authUrl);
    exit;
// Check given state against previously stored one to mitigate CSRF attack
} elseif (empty($_GET['state']) || ($_GET['state'] !== $_SESSION['oauth2state'])) {
    unset($_SESSION['oauth2state']);
    unset($_SESSION['provider']);
    exit('Invalid state');
} else {
    unset($_SESSION['provider']);
    // Try to get an access token (using the authorization code grant)
    $token = $provider->getAccessToken(
        'authorization_code',
        [
            'code' => $_GET['code']
        ]
    );

    // $token->getRefreshToken()
    // $token->getToken()
    enviarEmail($token->getRefreshToken());
}



function enviarEmail($token){

    date_default_timezone_set('Etc/UTC');

    $mail = new PHPMailer;
    $mail->isSMTP();
    $mail->SMTPDebug= 2;
    $mail->Host     = 'smtp.gmail.com';
    $mail->Port     = 587;
    $mail->SMTPSecure = 'tls';
    $mail->SMTPAuth = true;
    $mail->AuthType = 'XOAUTH2';
    $email          = 'mundodosnerds.com.br@gmail.com';
    $clientId       = '667627436910-509qu3a30recp5o4dbjbfc0e7sho0kid.apps.googleusercontent.com';
    $clientSecret   = '8OgtfWNBhlGtp-RWVegk77_R';
    $refreshToken   = $token;

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


}