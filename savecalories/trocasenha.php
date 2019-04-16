<?php
session_start();
require_once('db.class.php');
  if(!isset($_SESSION["email"])){
    header('Location: login.php');
  }
ini_set('default_charset', 'UTF-8');
$erro = isset($_GET["erro"]) ? $_GET["erro"] : 0;


?>
<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Trocar Senha - B&B - Save Calories</title>

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
      <div class="cadastro col-lg-8" style="margin-top: 200px; padding: 10px 10px; border-radius: 10px;">
          <form method="post" action="altera_senha.php" role="login">
          <?php
            if($erro == 1){
              echo '<font style="text-align-last: center; font-size: 20px;">Senha antiga diferente</font><br>';
            }
          ?>
          <label>Senha antiga:</label>
          <input type="password" name="senha1" placeholder="Sua antiga senha" required class="form-control input-lg">
          <label>Nova senha:</label>
          <input type="password" name="senha2" placeholder="Sua nova senha" required class="form-control input-lg">
          <section align="right" style="margin-top: 10px; margin-bottom: 10px;">
            <a href="dados.php" class="btn btn-danger btn-lg">
              Cancelar
            </a>
            <button type="submit" name="enviar" class="btn btn-lg btn-primary" onclick="return confirm('Tem certeza que deseja atualizar sua senha?')">Atualizar</button> 
          </section>
          </form>
      </div>
    </div>
  
  <section style="background-color: black; margin-top: 155px;">
    <div align="center" style="color: white;">
        &copy;2017 - B&B - Save Calories
     </div>
  </section>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
  
  </body>
</html>