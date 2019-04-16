<?php
session_start();
ini_set('default_charset', 'UTF-8');
require_once('db.class.php');
  if(!isset($_SESSION["email"])){
    header('Location: login.php');
  }

                $sql = " select * from alimento order by nome";
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
    <title>Novo Prato - B&B - Save Calories</title>


	<link rel="stylesheet" type="text/css" href="estilo-home.css" />
<!-- bootstrap - link cdn -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">


<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.4/css/bootstrap-select.min.css">

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
            <li class="formatacao-link-home"> <a href="dados.php">Meus dados</a> </li>
            <li class="formatacao-link-home"> <a href="sair.php">Sair</a> </li>
          </ul>
        </div>
      </div>
    </nav> <!-- fim da barra de navegacao -->


  <div class="container">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <div class="col-xs-2"></div>
      <div class="cadastro col-lg-8 col-xs-12" style="margin-top: 150px; padding: 20px 10px; border-radius: 10px;">
        <form method="post" action="teste.php" role="login" id="formulario">
          <div class="col-xs-12 col-md-6">
            <a class="btn btn-primary btn-block" id="novoProd" style="margin-top: 10px;" >
              <span class="glyphicon glyphicon-plus">Adicionar Campo</span>
            </a>
          </div>
          <div class="col-xs-12 col-md-6">
            <button class="btn btn-info btn-block" style="margin-top: 10px;" >Enviar</button>
          </div>
		  <div class="col-xs-12" style="margin-top: 10px;">
			<input type="text" name="nome" placeholder="Digite o nome do prato" required="" style="width: 100%" class="form-control" >
          </div>
		  <div id="item">
            <div class="col-xs-12 col-md-12">
            <select  name="alimento[]"  style="margin-top: 10px; width: 100%;" class="form-control">
              <option value="">Escolha um alimento</option>
              <?php
                while($row = mysqli_fetch_array($res)){
                  echo '<option value="'.$row['idAlimento'].'">'.$row['nome'].'</option>';
                }
              ?>
            </select>
            </div>
            <div class="col-xs-12 col-md-12" style="margin-top: 10px;">
              <input type="text" name="qtde[]" placeholder="Digite a quantidade" style="width: 100%" class="form-control input-lg">
            </div>
        </div>
        </form>
      </div>
  </div>

  <script type="text/javascript"> 
  $(document).ready(function() {
      $("#novoProd").click(function() {
      var novoItem = $("#item").clone().removeAttr('id'); // para não ter id duplicado
      novoItem.children('input').val('');
      $("#formulario").append(novoItem);
    });
  });
</script>

  <section style="background-color: black; margin-top: 150px;">
    <div align="center" style="color: white;">
        &copy;2017 - B&B - Save Calories
     </div>
  </section>
  <script type="text/javascript" src="https://www.google.com/jsapi"></script>
          <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>
          <!-- jquery - link cdn -->
    <script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>
          <!-- Latest compiled and minified JavaScript -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.4/js/bootstrap-select.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
  </body>
</html>