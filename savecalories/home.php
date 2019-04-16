<?php
session_start();
ini_set('default_charset', 'UTF-8');
require_once('db.class.php');
  if(!isset($_SESSION["email"])){
    header('Location: login.php');
  }
$cod = isset($_GET["cod"]) ? $_GET["cod"] : 0;
  $id = $_SESSION["idUsuario"];
  $qtde_dieta = $_SESSION["qtde_dieta"];
  $calorias_diarias = $_SESSION["cal_diaria"];
?>

<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Home - B&B - Save Calories</title>


	<link rel="stylesheet" type="text/css" href="estilo-home.css" />
    <!-- jquery - link cdn -->
    <script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>

    <!-- bootstrap - link cdn -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">

  </head>
  <body>
	<nav class="navbar naveg-home navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          	<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navegacao-home">
				<span class="sr-only">Alternar menu</span>
				<span class="icon-bar" style="background: white;"></span>
				<span class="icon-bar" style="background: white;"></span>
				<span class="icon-bar" style="background: white;"></span>
			</button>
			<a href="home.php" class="navbar-brand paginainicial-logo">
				<img src="imagens/logo.png" class="foto-logo" style="background-color: white;">
			</a>
        </div>
        <div class="collapse navbar-collapse" id="navegacao-home">
          <ul class="nav navbar-nav navbar-right formatacao-home">
            <li class="formatacao-link-home"> <a href="dados.php">Meus dados</a> </li>
            <li class="formatacao-link-home"> <a href="sair.php">Sair</a> </li>
          </ul>
        </div>
      </div>
    </nav> <!-- fim da barra de navegacao -->

    <div class="container">
    	<div class="row col-xs-12" align="center" style="margin-top: 200px;">
    		      <?php
        if($cod == 8){
          echo '<font style="font-size: 20px;"> Alimento enviado para analise </font><br><br>';
        }
      ?>
        <progress value="<?= $calorias_diarias ?>" max="<?= $qtde_dieta ?>" style="width: 300px;"></progress>
    	</div>
    	<div class="row col-xs-12">
    		<h4 style="color: black; margin-top: 20px;" align="center">Meta diária: <?= $qtde_dieta ?> calorias</h4>
        <h4 style="color: black;" align="center">Consumido: <?= $calorias_diarias ?></h4>
        <h5 style="color: black;" align="center">Você pode mudar sua meta diária em Meus dados -> Alterar dados</h5>
      </div>
      <div class="row col-xs-12" style="margin-top: 100px;">
        <div class="col-md-3 col-xs-0"></div>
        <div class="col-md-3 col-xs-12" style=" margin-top: 10px;">
          <a href="prato.php" style="text-decoration: none; ">
            <button class="btn btn-info btn-block">Pratos</button>
          </a>
        </div>
        <div class="col-md-3 col-xs-12" style=" margin-top: 10px;">
          <a href="alimentos.php" style="text-decoration: none;">
            <button class="btn btn-info btn-block">Alimentos</button>
          </a>
        </div>
        <div class="col-md-3 col-xs-0"></div>
      </div>
      <div class="row col-xs-12">
        <div class="col-md-3 col-xs-0"></div>
        <div class="col-md-6 col-xs-12">
          <a href="cadastrar_alimento_usuario.php" class="btn btn-warning btn-block" style="margin-top: 10px;">Cadastrar novo alimento</a>
        </div>
        <div class="col-md-3 col-xs-0"></div>
      </div>
	   </div>
  <section style="background-color: black; margin-top: 96px;">
    <div align="center" style="color: white;">
        &copy;2017 - B&B - Save Calories
     </div>
  </section>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
  </body>
</html>