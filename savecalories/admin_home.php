<?php
session_start();
ini_set('default_charset', 'UTF-8');
require_once('db.class.php');
  if(!isset($_SESSION["email"])){
    header('Location: login.php');
  }

  $sql = "select alimento_usuario.nome, alimento_usuario.calorias_por_100, tipo_alimento.nome_tipo from alimento_usuario inner join tipo_alimento on tipo_alimento.idTipo = alimento_usuario.tipo_alimento_idTipo";
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
    <title>Home - Admin - B&B - Save Calories</title>

    <!-- jquery - link cdn -->
    <script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>

    <!-- bootstrap - link cdn -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">

  </head>
  <body>
  	<h1>Ola admin</h1>
  	<div class="col-xs-12 col-md-3" style="margin-top: 100px;">
  		<a href="sair.php" class="btn btn-block btn-info">Sair</a>
  	</div>
  	<div class="col-xs-12 col-md-3" style="margin-top: 100px;">
  	<a href="analise.php" class="btn btn-info btn-block">Analise dos alimentos do usuario</a>
	</div>

	<div class="col-xs-12 col-md-3" style="margin-top: 100px;">
  	<a href="cadastrar_novo_alimento.php" class="btn btn-info btn-block">Cadastrar alimento</a>
	</div>

  <div class="col-xs-12 col-md-3" style="margin-top: 100px;">
    <a href="excluir_alterar.php" class="btn btn-info btn-block">Excluir ou alterar alimento</a>
  </div>

	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
  </body>
</html>
