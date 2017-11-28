<?php 

include "Conexao.php";

$sql = "delete from aluno where email = '".$_POST['email']."' and validado <> 1 order by id desc limit 1 ";
$return['sqlDelete']   = $sql;
$return['queryDelete'] = mysql_query($sql);

$cond = isset($return->condicao)? $return->condicao : '1';

$sql    = "INSERT INTO aluno(condicao, data, nome, email, telefone, segmento, tam_cd, itens_sku, qtd_postos_trabalho, notas_entrada_dia, n_pedidos_dia, qtd_caminhoes_dia, picking, notas_dia, validado) VALUES (
           '".$cond."' , 
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
           '0'
           )
          ";
$return['sqlInsert']   = $sql;
$return['queryInsert'] = mysql_query($sql);

var_dump($return);

?>