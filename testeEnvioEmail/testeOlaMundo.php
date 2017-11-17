<?php 

$connBD = mysql_connect('192.168.0.232', 'root', 'root');
$connBD = mysql_select_db('infomail', $connBD);

$sql = "CREATE TABLE IF NOT EXISTS 'aluno'(
        'id' int(3) PRIMARY KEY auto_increment not null,
        'email' varchar(50) not null,
        'condicao' varchar(10) not null,
        'data' DATE not null,
        ) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COMMENT='Table with abuse reports' AUTO_INCREMENT=2";

$query = mysql_query($sql);

var_dump($query);

?>