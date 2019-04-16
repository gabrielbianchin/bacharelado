<?php
session_start();
ini_set('default_charset', 'UTF-8');
require_once('db.class.php');
  if(!isset($_SESSION["email"])){
    header('Location: login.php');
  }
  $idAlimento = $_GET["id"];
  $sql = "select alimento.idAlimento, alimento.nome, alimento.calorias_por_100 from alimento where idAlimento = '$idAlimento'";
  $objdb = new db();
  $link = $objdb->conecta_mysql();
  $res = mysqli_query($link, $sql);
  while($produto = mysqli_fetch_array($res)){
    $id = $produto["idAlimento"];
    $nome = $produto["nome"];
    $qtde = $produto["calorias_por_100"];
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
    <h1>Alterar alimento</h1>
    <a href="admin_home.php" class="btn btn-info">Voltar</a>
    <form method="post" action="altera_alimento.php?id=<?php echo $id?>">
      <input type="text" name="nome" placeholder="Nome do alimento" style="width: 100%; margin-top: 20px;" value="<?php echo $nome; ?>">
      <input type="text" name="qtde" placeholder="calorias" style="width: 100%;  margin-top: 20px;" value="<?php echo $qtde; ?>">
      <button type="submit" class="btn btn-block btn-info" style=" margin-top: 20px;">Cadastrar</button>
    </form>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
  </body>
</html>
