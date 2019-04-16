<?php
session_start();
require_once('db.class.php');
  if(!isset($_SESSION["email"])){
    header('Location: login.php');
  }

?>

<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Pratos - B&B - Save Calories</title>

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
            <li class="formatacao-link-home"> <a href="dados.php">Meus dados</a> </li>
            <li class="formatacao-link-home"> <a href="sair.php">Sair</a> </li>
          </ul>
        </div>
      </div>
    </nav> <!-- fim da barra de navegacao -->

    <div class="container" style="margin-top: 300px;">
      <div class="row col-xs-12">
        <div class="col-md-2"></div>
        <div class="col-xs-12 col-md-8">
          <form method="post" action="calcula_prato.php" >
            <select name="id_prato" id="id_prato" style="width: 100%" class="form-control">
              <option value="">Selecione um prato</option>
                <?php
                    $id = $_SESSION["idUsuario"];
                    $sql = " select * from prato where usuario_idUsuario = '" .$id. "' order by nome";
                    $objdb = new db();
                    $link = $objdb->conecta_mysql();
                    $res = mysqli_query($link, $sql);
                    while($rolo = mysqli_fetch_assoc($res)){
                      echo '<option value=" ' .$rolo['idPrato']. '">' .$rolo["nome"]. '</option>';
                    }
                ?>
              </select>
          </div>
      </div>
      <div class="row" style="margin-top: 103px;">
        <div class="col-xs-0 col-md-2"></div>
        <div class="col-xs-12 col-md-4">
          <a href="cadastrar_novo_prato.php" style="text-decoration: none; margin-top: 15px;" class="btn btn-block btn-info">
            Cadastrar novo prato
          </a>
        </div>
        <div class="col-xs-12 col-md-4">
          <button class="btn btn-block btn-info" type="submit" style="margin-top: 15px;">Enviar</button>
        </div>
        <div class="col-xs-0 col-md-2"></div>
      </div>
      </form>
    </div>

  <section style="background-color: black; margin-top: 155px;">
    <div align="center" style="color: white;">
        &copy;2017 - B&B - Save Calories
     </div>
  </section>

<script type="text/javascript">
      $(function () {
      $('[data-toggle="tooltip"]').tooltip();
    })
</script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
  </body>
</html>