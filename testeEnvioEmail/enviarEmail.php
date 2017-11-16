<?php 

require 'vendor/autoload.php';

$return = new stdClass();
$emailInformata = "joao.neto@informata.com.br";

if($_GET['sendMail'] == "SendMailCompleteForClient")
{
    $name = $_POST['nome']; 
    $to   = $_POST['email'];
    $subject = "Olá ".$_POST['nome']." a informata agradeçe o contato!";

    $tam_cd     = (int)(str_replace(".","", $_POST['tam_cd']));
    $itens_sku  = (int)(str_replace(".","", $_POST['itens_sku']));
    $postos_trb = (int)(str_replace(".","", $_POST['qtd_postos_trabalho']));

    $return->variaveis = array($tam_cd, $itens_sku, $postos_trb);

    $return->cond01 = ($tam_cd >= 1000 && $tam_cd <= 5000)  ;
    $return->cond02 = ($itens_sku >= 1000 && $itens_sku <= 5000);
    $return->cond03 = ($postos_trb >= 10 && $postos_trb <= 50);
    $return->condFinal = ($tam_cd >= 1000 && $tam_cd <= 5000) && ($itens_sku >= 1000 && $itens_sku <= 5000) && ($postos_trb >= 10 && $postos_trb <= 50);

    if( ($tam_cd >= 1000 && $tam_cd <= 5000) && ($itens_sku >= 1000 && $itens_sku <= 5000) && ($postos_trb >= 10 && $postos_trb <= 50) )
    {
        // MENSAGEM NA ESPECTATIVA
        $msgConteudo = "
            <p>Prezado(a) ".$_POST['nome'].",</p>
            <p>Agradecemos seu interesse no STOCKBOX e com base na nossa experiência com outros clientes com perfil semelhante ao seu, podemos afirmar que sua empresa terá os seguintes benefícios diretos com a implantação do STOCKBOX:</p>
            <br>
            <p>1. Produtividade: Aumento da produtividade entre 15 e 35% com mais produção por pessoa mapeadas em tempo real;</p>
            <p>2. Velocidade: O tempo de separar, preparar e embarcar os pedidos vai diminuir entre 20 e 30%;</p>
            <p>3. Segurança: Assertividade de 99,98%, ou seja, erros próximos de zero no estoque e baixo custo com devoluções;</p>
            <p>4. Ambiente mais confortável e apresentável, retroalimento a produtividade em mais de 5%;</p>
            <p>5. O retorno do investimento acontece entre 90 e 180 dias.</p>
            <br>
            <p>Estamos no mercado desde 1986, com matriz em Recife/PE e unidade em São Paulo/SP e atendemos a nível nacional, caso tenha interesse em conhecer melhor as nossas soluções, podemos marcar uma visita ou um call para mostrarmos como podemos ajudar a melhorar o seu negócio.</p>
            <br>
            <p>Você também pode entrar em contato conosco através do telefone +55 (81) 3202-2222 ou pelo email contato@informata.com.br</p>
            <br>
            <p>Atenciosamente,</p>
            <p>Informata</p>
            <p>www.informata.com.br</p>

        ";

    }
    if( $tam_cd > 5000 && $itens_sku > 5000 && $postos_trb > 50 )
    {
        // MENSAGEM ACIMA DA ESPECTATIVA
        $msgConteudo = "<p>Prezado(a) ".$_POST['nome'].",</p>
           <p>Agradecemos seu interesse no STOCKBOX e com base no perfil do seu negócio, sentimos a necessidade de uma melhor compreensão sobre sua dinâmica de trabalho e conhecer um pouco mais sobre a sua empresa.</p>
            <p>Armazéns e centros de distribuição com maiores capacidades requerem uma atenção especial e por isso nossos consultores entrarão em contato para fazer um atendimento personalizado e voltado para a sua necessidade.</p>
            <p>Atenciosamente,</p>
            <p>Informata</p>
            <p>www.informata.com.br</p>";
    }
    if( $tam_cd < 5000 && $itens_sku < 5000 && $postos_trb < 50 )
    {
        // MENSAGEM ABAIXO DA ESPECTATIVA
        $msgConteudo = "<p>Prezado(a) ".$_POST['nome'].",
           <p> Agradecemos seu interesse no STOCKBOX e com base no perfil do seu negócio, sentimos a necessidade de uma melhor compreensão sobre sua dinâmica de trabalho e conhecer um pouco mais sobre a sua empresa, por isso nossos consultores entrarão em contato para fazer um atendimento personalizado e voltado para a sua necessidade.</p>
            <p>Atenciosamente,</p>
            <p>Informata</p>
            <p>www.informata.com.br</p>";
    }
    if($_POST['segmento'] == "NoN")
    {
        // MENSAGEM SEGMENTO OUTROS
        $msgConteudo = "<p>Prezado(a) ".$_POST['nome'].",</p>
            <p>Agradecemos seu interesse no STOCKBOX e com base no perfil do seu negócio, sentimos a necessidade de uma melhor compreensão sobre sua dinâmica de trabalho e conhecer um pouco mais sobre a sua empresa, por isso nossos consultores entrarão em contato para fazer um atendimento personalizado e voltado para a sua necessidade.</p>
            <p>Atenciosamente,</p>
            <p>Informata</p>
            <p>www.informata.com.br</p>";
    }else{
        // NÃO ESTA NEM ACIMA NEM ABAIXO DA ESPECTATIVA
        $msgConteudo = "
            <p>Prezado(a) ".$_POST['nome'].",</p>
            <p>Agradecemos seu interesse no STOCKBOX e com base na nossa experiência com outros clientes com perfil semelhante ao seu, podemos afirmar que sua empresa terá os seguintes benefícios diretos com a implantação do STOCKBOX:</p>
            <br>
            <p>1. Produtividade: Aumento da produtividade entre 15 e 35% com mais produção por pessoa mapeadas em tempo real;</p>
            <p>2. Velocidade: O tempo de separar, preparar e embarcar os pedidos vai diminuir entre 20 e 30%;</p>
            <p>3. Segurança: Assertividade de 99,98%, ou seja, erros próximos de zero no estoque e baixo custo com devoluções;</p>
            <p>4. Ambiente mais confortável e apresentável, retroalimento a produtividade em mais de 5%;</p>
            <p>5. O retorno do investimento acontece entre 90 e 180 dias.</p>
            <br>
            <p>Estamos no mercado desde 1986, com matriz em Recife/PE e unidade em São Paulo/SP e atendemos a nível nacional, caso tenha interesse em conhecer melhor as nossas soluções, podemos marcar uma visita ou um call para mostrarmos como podemos ajudar a melhorar o seu negócio.</p>
            <br>
            <p>Você também pode entrar em contato conosco através do telefone +55 (81) 3202-2222 ou pelo email contato@informata.com.br</p>
            <br>
            <p>Atenciosamente,</p>
            <p>Informata</p>
            <p>www.informata.com.br</p>

        ";  
    }


    $message = "<html>
    <head>
        <title>Olá ".$_POST['nome']." obrigado pelo contato!</title>
    </head>
    <body>
        ".$msgConteudo."
    </body>
    </html>
    ";

}

if($_GET['sendMail'] == "SendMailCompleteForInformata"){

    $to = $emailInformata;
    $subject = "Olá informata um potencial cliente entrou em contato!";

    $message = "
    <html>
    <head>
        <title>Olá informata um potencial cliente entrou em contato!</title>
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
        <title>Olá informata um cliente em potencial abandonou o formulário!</title>
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


// $from = new SendGrid\Email("Informata", $to);
// $to   = new SendGrid\Email($name, $to);
// $content = new SendGrid\Content("text/html", $message);

// $mail = new SendGrid\Mail($from, $subject, $to, $content);
// $sg   = new \SendGrid("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");
// $response = $sg->client->mail()->send()->post($mail);

// $return->statusMail = $response->statusCode();
// $return->bodyMail   = $response->body();

$return->StatusMail = mail($to, $subject, "ola mundo");

echo json_encode($return);

?>