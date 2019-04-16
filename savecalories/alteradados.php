<?php
session_start();
ini_set('default_charset', 'UTF-8');
require_once('db.class.php');
  if(!isset($_SESSION["email"])){
    header('Location: login.php');
  }

$erro = isset($_GET["erro"]) ? $_GET["erro"] : 0;


?>
<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Alterar Dados - B&B - Save Calories</title>

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
            <li class="formatacao-link-home"> <a href="home.php">Home</a> </li>
            <li class="formatacao-link-home"> <a href="login.php">Sair</a> </li>
          </ul>
        </div>
      </div>
    </nav> <!-- fim da barra de navegacao -->


    <div class="container">
      <div class="col-lg-2"></div>
      <div class="cadastro col-lg-8" style="margin-top: 80px; padding: 10px 10px; border-radius: 10px;">
          <form method="post" action="altera_dados.php" role="login">
          <?php
          if($erro == 1){               
            echo '<font color="#ff0000" style="margin-left: 300px; font-size: 20px;">Senhas diferentes</font>';
          }
          if($erro == 2){
            echo '<font color="#ff0000" style="margin-left: 260px; font-size: 20px;">Erro ao registrar o usuario</font>';
          }
          ?>
          <label>Nome:</label>
          <input type="name" name="nome" placeholder="Atualize o seu nome" required class="form-control input-lg" value="<?= $_SESSION["nome"] ?>">
          <label>Email:</label>
          <input type="email" name="email" placeholder="Atualize o seu e-mail" required class="form-control input-lg" value="<?= $_SESSION["email"] ?>">
          <label>Meta diaria:</label>
          <input type="text" name="dieta" placeholder="Atualize a sua meta diaria" class="form-control input-lg"  value="<?= $_SESSION["qtde_dieta"] ?>">
          <label>Peso:</label>
          <input type="text" name="peso" placeholder="Atualize o seu peso em kg" class="form-control input-lg"  value="<?= $_SESSION["peso"] ?>">
          <label>Altura:</label>
          <input type="text" name="altura" placeholder="Atualize a sua altura em metros" class="form-control input-lg"  value="<?= $_SESSION["altura"] ?>">
          <section align="right" style="margin-top: 10px; margin-bottom: 10px;">
            <a href="dados.php" class="btn btn-danger btn-lg">
              Cancelar
            </a>
            <button type="submit" name="enviar" class="btn btn-lg btn-primary" onclick="return confirm('Tem certeza que deseja atualizar seus dados?')">Atualizar</button> 
          </section>
          </form>
      </div>
    </div>
  
  <section style="background-color: black; margin-top: 26px;">
    <div align="center" style="color: white;">
        &copy;2017 - B&B - Save Calories
     </div>
  </section>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
  
  </body>
</html>