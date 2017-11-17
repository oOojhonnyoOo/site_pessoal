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

  <title>teste 2</title>
  
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

  <section class="container">
    <header class="fixed-top clearfix">
      <div class="col-md-4"><a href="http://localhost/wp"><img src="img/logo_horizontal.png"/></a></div>
      <div class="col-md-8 titulo">Relação de emails que entraram em contato com a informata</div>
    </header>
    <br clear="all">
    <section class="panel panel-default">
      <header class="panel-heading"><h3>Preencha o Formulário</h3></header>


      <div class="form-horizontal espaco area-agradecimento">
        <center>
        	<table class="table">
        		<th>
        			<td>Email</td>
        			<td>Condição</td>
        			<td>Data</td>
        		</th>
        		<?php 

        		$result = mysql_query("SELECT email, condicao, data FROM aluno");

				while ($row = mysql_fetch_array($result, MYSQL_NUM)) {
				    echo "<tr>
				    		<td>".$row[0]."</td>
				    		<td>".$row[1]."</td>
				    		<td>".$row[2]."</td>
				    	  </tr>
				    	 ";  
				}

        		?>
        	</table>
        </center>
      </div>


    </section>
  </section>

</body>
</html>