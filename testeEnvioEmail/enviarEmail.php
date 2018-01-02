<?php 

include "Conexao.php";
require 'PHPMailer-5.2.26/PHPMailerAutoload.php';

$return = new stdClass();

$emailInformata = "joao.neto@informata.com.br";

if($_GET['sendMail'] == "SendMailCompleteForClient")
{
    $name = $_POST['nome']; 
    $to   = $_POST['email'];
    $subject = "Ola ".$_POST['nome']." a informata agradeçe o contato!";

    $tam_cd     = (int)(str_replace(".","", $_POST['tam_cd']));
    $itens_sku  = (int)(str_replace(".","", $_POST['itens_sku']));
    $postos_trb = (int)(str_replace(".","", $_POST['qtd_postos_trabalho']));

    $return->variaveis = array($tam_cd, $itens_sku, $postos_trb,$_POST['segmento']);
    
    if( ($tam_cd >= 1000 && $tam_cd <= 5000) && ($itens_sku >= 1000 && $itens_sku <= 5000) && ($postos_trb >= 10 && $postos_trb <= 50) )
    {
        $return->condicao = 2;
        // MENSAGEM NA ESPECTATIVA
        $msgConteudo = "
            <p>Prezado(a) ".$_POST['nome'].",</p>
            <p>Agradecemos seu interesse no STOCKBOX e com base na nossa experiência com outros clientes com perfil semelhante ao seu, podemos afirmar que sua empresa terá os seguintes benefícios diretos com a implantação do STOCKBOX:</p>
            <br>
            <p>1. Produtividade: Aumento da produtividade entre 15 e 35% com mais produção por pessoa mapeadas em tempo real;</p>
            <p>2. Velocidade: O tempo de separar, preparar e embarcar os pedidos vai diminuir entre 20 e 30%;</p>
            <p>3. Segurança: Assertividade de 99,98%, ou seja, erros próximos de zero no estoque e baixo custo com devoluções;</p>
            <p>4. Ambiente mais confortável e apresentável, retroalimenta a produtividade em mais de 5%;</p>
            <p>5. O retorno do investimento acontece entre 90 e 180 dias.</p>
            <br>
            <p>Estamos no mercado desde 1986, com matriz em Recife/PE e unidade em São Paulo/SP e atendemos todo país, caso tenha interesse em conhecer melhor as nossas soluções, podemos marcar uma visita ou um call para mostrarmos como podemos ajudar a melhorar o seu negócio.</p>
            <br>
            <p>Você também pode entrar em contato conosco através do telefone +55 (81) 3202-2222 ou pelo email contato@informata.com.br</p>
            <br>
            <p>Atenciosamente,</p>
            <p>Informata</p>
            <p>www.informata.com.br</p>

        ";

    }
    else if( $tam_cd > 5000 && $itens_sku > 5000 && $postos_trb > 50 )
    {
        $return->condicao = 3;
        // MENSAGEM ACIMA DA ESPECTATIVA
        $msgConteudo = "<p>Prezado(a) ".$_POST['nome'].",</p>
           <p>Agradecemos seu interesse no STOCKBOX e com base no perfil do seu negócio, sentimos a necessidade de uma melhor compreensão sobre sua dinâmica de trabalho e conhecer um pouco mais sobre a sua empresa.</p>
            <p>Armazéns e centros de distribuição com maiores capacidades requerem uma atenção especial e por isso nossos consultores entrarão em contato para fazer um atendimento personalizado e voltado para a sua necessidade.</p>
            <p>Atenciosamente,</p>
            <p>Informata</p>
            <p>www.informata.com.br</p>";
    }
    else if( $tam_cd < 5000 && $itens_sku < 5000 && $postos_trb < 50 )
    {
        $return->condicao = 4;
        // MENSAGEM ABAIXO DA ESPECTATIVA
        $msgConteudo = "<p>Prezado(a) ".$_POST['nome'].",
           <p> Agradecemos seu interesse no STOCKBOX e com base no perfil do seu negócio, sentimos a necessidade de uma melhor compreensão sobre sua dinâmica de trabalho e conhecer um pouco mais sobre a sua empresa, por isso nossos consultores entrarão em contato para fazer um atendimento personalizado e voltado para a sua necessidade.</p>
            <p>Atenciosamente,</p>
            <p>Informata</p>
            <p>www.informata.com.br</p>";
    }else{
        $return->condicao = 6;
        // NÃO ESTA NEM ACIMA NEM ABAIXO DA ESPECTATIVA
        $msgConteudo = "<p>Prezado(a) ".$_POST['nome'].",</p>
           <p>Agradecemos seu interesse no STOCKBOX e com base no perfil do seu negócio, sentimos a necessidade de uma melhor compreensão sobre sua dinâmica de trabalho e conhecer um pouco mais sobre a sua empresa.</p>
            <p>Armazéns e centros de distribuição com maiores capacidades requerem uma atenção especial e por isso nossos consultores entrarão em contato para fazer um atendimento personalizado e voltado para a sua necessidade.</p>
            <p>Atenciosamente,</p>
            <p>Informata</p>
            <p>www.informata.com.br</p>";
    }

    if($_POST['segmento'] == "Outros" || $_POST['segmento'] == "NoN"  )
    {
        $return->condicao = 5;
        // MENSAGEM SEGMENTO OUTROS
        $msgConteudo = "<p>Prezado(a) ".$_POST['nome'].",</p>
            <p>Agradecemos seu interesse no STOCKBOX e com base no perfil do seu negócio, sentimos a necessidade de uma melhor compreensão sobre sua dinâmica de trabalho e conhecer um pouco mais sobre a sua empresa, por isso nossos consultores entrarão em contato para fazer um atendimento personalizado e voltado para a sua necessidade.</p>
            <p>Atenciosamente,</p>
            <p>Informata</p>
            <p>www.informata.com.br</p>";        
    }


    $message = "<html>
    <head>
        <title>Ola ".$_POST['nome']." obrigado pelo contato!</title>
    </head>
    <body>
        ".$msgConteudo."
    </body>
    </html>
    ";

//    $sql = "delete from usuario where email = '".$_POST['email']."' and validado <> 1 order by id desc limit 1 ";
//    $return->sqlDelete   = $sql;
//    $return->queryDelete = mysql_query($sql);

    $sql    = "INSERT INTO usuario(condicao, data, nome, email, telefone, segmento, tam_cd, itens_sku, qtd_postos_trabalho, notas_entrada_dia, n_pedidos_dia, qtd_caminhoes_dia, picking, notas_dia, validado) VALUES (
               '".$return->condicao."' , 
               '".date('Y-m-d')."',
               '".$_POST['nome']."' , 
               '".$_POST['email']."' , 
               '".$_POST['telefone']."' , 
               '".$_POST['segmento']."' , 
               '".$_POST['tam_cd']."' , 
               '".$_POST['itens_sku']."' , 
               '".$_POST['qtd_postos_trabalho']."' , 
               '".$_POST['notas_entrada_dia']."' , 
               '".$_POST['n_pedidos_dia']."' , 
               '".$_POST['qtd_caminhoes_dia']."' , 
               '".$_POST['picking']."' , 
               '".$_POST['notas_dia']."',
               '1'
               )
              ";
    $return->sqlInsert   = $sql;
    $return->queryInsert = mysql_query($sql);

}

if($_GET['sendMail'] == "SendMailCompleteForInformata"){
    $name = "informata";
    $to = $emailInformata;
    $subject = "Ola informata um potencial cliente entrou em contato!";

    $message = "
    <html>
    <head>
        <title>Ola informata um potencial cliente entrou em contato!</title>
    </head>
    <body>

        <p>Nome: ".$_POST['nome']."</p>
        <p>Email: ".$_POST['email']."</p>
        <p>Telefone: ".$_POST['telefone']."</p>
        <p>Segmento: ".$_POST['segmento']."</p>
        <p>Tamanho do CD em m2: ".$_POST['tam_cd']." m2</p>
        <p>Quantos itens/SKU's comercializa: ".$_POST['itens_sku']."</p>
        <p>Quantos postos de trabalho existe: ".$_POST['qtd_postos_trabalho']."</p>
        <p>Quantas notas de entrada recebe por dia: ".$_POST['notas_entrada_dia']."</p>
        <p>Nº de pedidos separados por dia: ".$_POST['n_pedidos_dia']."</p>
        <p>Quantos caminhões carregam por dia: ".$_POST['qtd_caminhoes_dia']."</p>
        <p>Tem picking de fracionado com conferência no final: ".$_POST['picking']."</p>
        <p>Quantas notas de devolução no dia: ".$_POST['notas_dia']."</p>
        <p>Data da solicitação: ".date("d / m / Y - H:m:s")." </p>

    </body>
    </html>
    ";

}


if($_GET['sendMail'] == "SendMailInCompleteForInformata"){
    $name = "informata";
    $to   = $emailInformata;
    $subject = "Olá informata um cliente em potencial abandonou o formulário";

    $message = "
    <html>
    <head>
        <title>Ola informata um cliente em potencial abandonou o formulário!</title>
    </head>
    <body>

        <p>Nome: ".$_POST['nome']."</p>
        <p>Email: ".$_POST['email']."</p>
        <p>Telefone: ".$_POST['telefone']."</p>
        <p>Segmento: ".$_POST['segmento']."</p>

    </body>
    </html>
    ";

}

// ENVIANDO EMAIL 
//$headers  = 'MIME-Version: 1.0' . "\r\n";
//$headers .= 'Content-type: text/html; charset=utf-8' . "\r\n";
//$headers .= 'To: Informata joao.neto@informata.com.br' . "\r\n";
//$headers .= 'From: Informata <joao.neto@informata.com.br>' . "\r\n";
//$headers .= 'Cc: joao.neto@informata.com.br' . "\r\n";
//$headers .= 'Bcc: joao.neto@informata.com.br' . "\r\n";
//$headers .= "X-Mailer: PHP/".phpversion();
//$return->to = $to;
//$return->StatusMail = mail($to, $subject, $message, $headers);

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
$mail->CharSet  = 'UTF-8';

$mail->setFrom("joao.neto@informata.com.br", 'Joao Neto');
$mail->addReplyTo('joao.neto@informata.com.br', 'joao neto');
$mail->addAddress($to, $name);

$mail->Subject = $subject;
$mail->msgHTML($message);

if (!$mail->send()) {
    echo "Mailer Error: " . $mail->ErrorInfo;
} else {
    echo "Message sent!";

}

?>