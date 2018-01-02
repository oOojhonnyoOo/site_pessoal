<?php include "Conexao.php"; ?>
<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <link rel="stylesheet" href="css\bootstrap.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script type="text/javascript" src="js/jquery.mask.min.js"></script>
  <script type="text/javascript" src="js/bootstrap.js"></script>
  <link rel="stylesheet" id="font-awesome-css" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css?ver=4.8.2" type="text/css" media="all">

  <title>lista emails stockbox</title>
  
  <style type="text/css">
  body {
    padding-top:40px;
    background-image: url('img/background.jpg') ;
  }
  /*.container {background: #fff; padding: 20px;}*/
  .logo {float: left; padding-left: 10px; }
  .logo img {vertical-align: middle;  height: auto;}
  .titulo {color: #fff; font-size: 1.4em; text-align: center; vertical-align: middle; }
.panel {/*padding:20px;*/}
.espaco {padding: 20px;}

h3 {text-transform: uppercase; font-size: 1.1em; color: #666;}
h4 {text-align: center; color: #0170af; margin-bottom: 20px;}
.stepwizard-step p {
  margin-top: 10px;
}
.stepwizard-row {
  display: table-row;
}
.stepwizard {
  display: table;
  width: 50%;
  position: relative;
}
.stepwizard-step button[disabled] {
  opacity: 1 !important;
  filter: alpha(opacity=100) !important;
}
.stepwizard-row:before {
  top: 14px;
  bottom: 0;
  position: absolute;
  content: " ";
  width: 100%;
  height: 1px;
  background-color: #ccc;
  z-order: 0;
}
.stepwizard-step {
  display: table-cell;
  text-align: center;
  position: relative;
}
.btn-circle {
  width: 30px;
  height: 30px;
  text-align: center;
  padding: 6px 0;
  font-size: 12px;
  line-height: 1.428571429;
  border-radius: 15px;
}
.rodape { display: block; min-height: 60px; color: #ceddef; text-align: center; padding-top: 15px; margin-top:25px;}

</style>

</head>
<body>

  <section class="container  col-md-12">
    <header class="fixed-top clearfix">
      <div class="col-md-4"><a href="http://localhost/wp"><img src="img/logo_horizontal.png"/></a></div>
      <div class="col-md-8 titulo"></div>
    </header>
    <br clear="all">
    <section class="panel panel-default">
      <header class="panel-heading"><h3>Relação de emails que entraram em contato com a informata</h3></header>


      <div class="form-horizontal espaco area-agradecimento">
        <center>
        	<table class="table">
        		<thead>
	        		<tr>
	        			<th>Nome</th>
	        			<th>Email</th>
	        			<th>Condição</th>
                <th>data</th>
                <th>telefone</th>
                <th>segmento</th>
                <th>tam cd</th>
                <th>itens sku</th>
                <th>postos trb</th>
                <th>notas entrada</th>
                <th>n pedidos</th>
                <th>qtd caminhoes</th>
                <th>picking</th>
                <th>notas dia</th>
	        		</tr>
        		</thead>
        		<tbody>
        		<?php 
        		$result = mysql_query("SELECT nome, email, condicao, data, telefone, segmento, tam_cd, itens_sku, qtd_postos_trabalho, notas_entrada_dia, n_pedidos_dia, qtd_caminhoes_dia, picking, notas_dia FROM usuario order by id desc");
    				while ($row = mysql_fetch_array($result, MYSQL_NUM)) {
    				    echo "<tr>
        				    		<td>".$row[0]."</td>
        				    		<td>".$row[1]."</td>
                        <td>".$row[2]."</td>
                        <td>".$row[3]."</td>
                        <td>".$row[4]."</td>
                        <td>".$row[5]."</td>
                        <td>".$row[6]."</td>
                        <td>".$row[7]."</td>
                        <td>".$row[8]."</td>
                        <td>".$row[9]."</td>
                        <td>".$row[10]."</td>
                        <td>".$row[11]."</td>
                        <td>".$row[12]."</td>
                        <td>".$row[13]."</td>
      				    	  </tr>
      				    	 ";  

        		}
        		?>
        		</tbody>
        	</table>
        </center>
      </div>


    </section>
  </section>

</body>
</html>