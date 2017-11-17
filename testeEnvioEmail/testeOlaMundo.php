<?php 

$connBD = mysql_connect('mysql762.umbler.com:41890', 'rootinfomail', '12345678abc');
$connBD = mysql_select_db('infomail', $connBD);

//$query = mysql_query($sql);

var_dump($connBD);

?>