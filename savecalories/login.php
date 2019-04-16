<?php
$cod = isset($_GET["cod"]) ? $_GET["cod"] : 0;
$erro = isset($_GET["erro"]) ? $_GET["erro"] : 0;
ini_set('default_charset', 'UTF-8');
?>
<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Login - B&B - Save Calories</title>


	<link rel="stylesheet" type="text/css" href="estilo.css" />
    <!-- jquery - link cdn -->
    <script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>

    <!-- bootstrap - link cdn -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  </head>
  <font style=""></font>
  <body class="foto-fundo">
	<div class="container">
			<div class="login-form">
				<form method="post" action="validar_usuario.php" role="login">
						<img src="imagens/logo.png" class="img-responsive">
          <?php
          if($cod == 1){
            echo '<font style="text-align-last: 20px; font-size: 20px;"> Cadastro realizado com sucesso </font>';
          }
          if($cod == 2){
            echo '<font style="text-align: center;"> Exclusao realizada com sucesso</font>';
          }
          if($erro == 1){
            echo '<font color="#ff0000" style="text-align: center;">Erro ao efetuar o login</font>';
          }
          ?>
					<input type="email" name="email" placeholder="E-mail" required class="form-control input-lg">
					<input type="password" name="senha" placeholder="Senha" required class="form-control input-lg">
					<button type="submit" name="enviar" class="btn btn-lg btn-primary btn-block">Login</button>
					<div>
						<a href="criarconta.php">Criar conta</a> ou <a href="redefinir.php">Redefinir senha</a>
					</div>
				</form>
			</div>
	</div>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
  </body>
</html>