<?php
session_start();
ini_set('default_charset', 'UTF-8');
  if(!isset($_SESSION["email"])){
    header('Location: login.php');
  }
  $cod = isset($_GET["cod"]) ? $_GET["cod"] : 0;
  $erro = isset($_GET["erro"]) ? $_GET["erro"] : 0;
?>

<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Dados - B&B - Save Calories</title>

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
            <li class="formatacao-link-home"> <a href="sair.php">Sair</a> </li>
          </ul>
        </div>
      </div>
    </nav> <!-- fim da barra de navegacao -->

    <div class="container" style="margin-top: 150px;">
      <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xs-offset-0 col-sm-offset-0 col-md-offset-3 col-lg-offset-3">
          <div class="panel panel-info">
            <div class="panel-heading">
              <h3 class="panel-title">
              <?= $_SESSION["nome"] ?>
              </h3>
            </div>
            <div class="panel-body" style="text-align-last: center;">
              <div class="row">
                <div class=" col-md-12 col-lg-12"> 
                  <table class="table table-user-information">
                    <tbody>
                      <?php
                        if($cod == 1){
                          echo '<font style="text-align-last: center; font-size: 20px;">Usuario atualizado com sucesso</font>';
                        }
                        if($erro == 1){
                          echo '<font color="#ff0000" style="text-align-last: center; font-size: 20px;"> Erro ao excluir usuario </font>';
                        }
                      ?>
                      <tr>
                        <td>Data de cadastro:</td>
                        <td>
                        <?= $_SESSION["data"] ?>
                        </td>
                      </tr>
                      <tr>
                        <td>Peso:</td>
                        <td>
                        <?= $_SESSION["peso"] ?>
                        </td>
                      </tr>
                      <tr>
                        <td>Altura:</td>
                        <td>
                        <?= $_SESSION["altura"] ?>
                        </td>
                      </tr>
                      <tr>
                        <td>Email</td>
                        <td>
                        <?= $_SESSION["email"] ?>
                        </td>    
                      </tr>
                     
                    </tbody>
                  </table>
                </div>
                <div class="panel-footer">
                <a href="trocasenha.php" style="text-decoration: none; margin-top: 10px;" class="col-sm-6 col-xs-12">
                  <button class="btn btn-info btn-block">Alterar senha</button>
                </a>
                <a href="alteradados.php" style="text-decoration: none; margin-top: 10px;" class="col-sm-6 col-xs-12">
                  <button class="btn btn-info btn-block">Alterar dados</button>
                </a>
                <a href="excluidados.php" style="text-decoration: none; margin-top: 10px;" class="col-xs-12" onclick="return confirm('Tem certeza que deseja deletar seus dados?')">
                  <button class="btn btn-danger btn-block">Excluir conta</button>
                </a>
              </div>  
            </div>
        </div>
      </div>
    </div>
</div>
</div>

  <section style="background-color: black; margin-top: 111px;">
    <div align="center" style="color: white;">
        &copy;2017 - B&B - Save Calories
     </div>
  </section>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
  </body>
</html>