<?php
session_start();
ini_set('default_charset', 'UTF-8');
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
    <title>Cadastro Novo Alimento - B&B - Save Calories</title>


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


  <div class="container">
    <div class="col-lg-2"></div>
      <div class="cadastro col-lg-8" style="margin-top: 100px; padding: 20px 10px; border-radius: 10px;">
        <form method="post" action="enviar_para_analise.php" role="login" class="">
          <input type="text" name="nome" placeholder="Digite o nome do alimento" required="" style="width: 100%" class="form-control input-lg">
          <label style="margin-top: 0px;"></label>
            <select id="id_categoria" name="id_categoria" class="form-control" style="font-family: serif;">
              <option value="">Escolha o tipo</option>
              <?php
                $sql = " select * from tipo_alimento order by nome_tipo";
                $objdb = new db();
                $link = $objdb->conecta_mysql();
                $res = mysqli_query($link, $sql);
                while($row = mysqli_fetch_array($res)){
                  echo '<option value="'.$row['idTipo'].'">'.$row['nome_tipo'].'</option>';
                }
              ?>
            </select>
          <label style="margin-top: 1px;"></label>
          <input type="text" name="qtde" placeholder="Digite a quantidade de calorias" required="" style="width: 100%" class="form-control input-lg">
          <div class="col-md-9 col-xs-0"></div>
          <div class="col-md-3 col-xs-12" style="margin-top: 20px;">
            <button type="submit" class="btn btn-info btn-block">Enviar</button>
          </div>
        </form>
      </div>
  </div>

  <section style="background-color: black; margin-top: 150px;">
    <div align="center" style="color: white;">
        &copy;2017 - B&B - Save Calories
     </div>
  </section>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
  </body>
</html>