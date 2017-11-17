<?php 

$connBD = mysql_connect('192.168.0.232', 'root', 'root');
$return->connBD = mysql_select_db('infomail', $connBD);

$sql = "CREATE TABLE aluno(
        'id' int(3) PRIMARY KEY auto_increment not null,
        'email' varchar(50) not null,
        'condicao' varchar(10) not null,
        'data' DATE not null,
        )";

$return->query = mysql_query($sql);

?>