<?php
session_start();
ini_set('default_charset', 'UTF-8');
require_once('db.class.php');
  if(!isset($_SESSION["email"])){
    header('Location: login.php');
  }

  $sql = "select alimento_usuario.idAlim_usu, alimento_usuario.nome, alimento_usuario.calorias_por_100, tipo_alimento.nome_tipo from alimento_usuario inner join tipo_alimento on tipo_alimento.idTipo = alimento_usuario.tipo_alimento_idTipo";
  $objdb = new db();
  $link = $objdb->conecta_mysql();
  $res = mysqli_query($link, $sql);
?>


<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Analise - B&B - Save Calories</title>

    <!-- jquery - link cdn -->
    <script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>

    <!-- bootstrap - link cdn -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">

  </head>
  <body>
  	<div class="container">
  		<div class="row">
  			<div">
  				<h1>Analise</h1>
          <a href="admin_home.php" class="btn btn-info btn-lg">Voltar</a>
  				<table class="table table-bordered table-hover" style="margin-top: 20px;">
  					<thead>
  						<tr>
  							<td>Nome</td>
  							<td>Calorias</td>
  							<td>Tipo</td>
  							<td>Aceitar</td>
  							<td>Recusar</td>
  						</tr>
  					</thead>
  					<tbody>
  						<?php while($produto = mysqli_fetch_array($res)){ ?>
  						<tr>
  							<td><?php echo $produto["nome"]; ?></td>
  							<td><?php echo $produto["calorias_por_100"]; ?></td>
  							<td><?php echo $produto["nome_tipo"]; ?></td>
  							<td><a href="aceitar_analise.php?id=<?php echo $produto["idAlim_usu"]; ?>" class="btn btn-block btn-success" onclick="return confirm('Tem certeza que deseja aceitar esse alimento?')">
  								<span class="glyphicon glyphicon-ok"></span></a>
  							</td>
  							<td><a href="recusar_analise.php?id=<?php echo $produto["idAlim_usu"]; ?>" class="btn btn-block btn-danger" onclick="return confirm('Tem certeza que deseja recusar esse alimento?')">
  							<span class="glyphicon glyphicon-remove"></span></a>
  							</td>
  						</tr>
  						<?php }  ?>
  					</tbody>
  				</table>
  			</div>
  		</div>
  	</div>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
  </body>
</html>
