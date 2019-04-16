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
    <title>Home - Admin - B&B - Save Calories</title>

    <!-- jquery - link cdn -->
    <script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>

    <!-- bootstrap - link cdn -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">

  </head>
  <body >
    <h1>Cadastrar novo alimento</h1>
    <a href="admin_home.php" class="btn btn-info">Voltar</a>
    <form method="post" action="cadastra_alimento.php">
      <input type="text" name="nome" placeholder="Nome do alimento" style="width: 100%; margin-top: 20px;">
      <select id="id_categoria" name="id_categoria" class="form-control" style="font-family: serif;  margin-top: 20px;">
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
      <input type="text" name="qtde" placeholder="calorias" style="width: 100%;  margin-top: 20px;">
      <button type="submit" class="btn btn-block btn-info" style=" margin-top: 20px;">Cadastrar</button>
    </form>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
  </body>
</html>
