<?php 

include "Conexao.php";

// SALVANDO DADOS NO BANCO DE DADOS
$sql    = "INSERT INTO aluno(condicao, data, nome, email, telefone, segmento, tam_cd, itens_sku, qtd_postos_trabalho, notas_entrada_dia, n_pedidos_dia, qtd_caminhoes_dia, picking, notas_dia) VALUES (
           '1' , 
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
           '".$_POST['notas_dia']."' 
           )
          ";
$return['sql']   = $sql;
$return['query'] = mysql_query($sql);

var_dump($return);

?>