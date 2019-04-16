<?php

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
    <title>Criar conta - B&B - Save Calories</title>

	<link rel="stylesheet" type="text/css" href="estilo.css" />
		<!-- jquery - link cdn -->
		<script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>

		<!-- bootstrap - link cdn -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  </head>
  <body class="foto-fundo">

	<div class="container">
			<div class="cadastro">
				<form method="post" action="registra_usuario.php" role="login">
					<img src="imagens/logo.png" class="img-responsive">
					<?php
					if($erro == 1){								
						echo '<font color="#ff0000" style="text-align-last: center; font-size: 20px;">Senhas diferentes</font>';
					}
					else if($erro == 2){
						echo '<font color="#ff0000" style="text-align-last: center; font-size: 20px;">Erro ao registrar o usuario</font>';
					}
					?>
					<input type="name" name="nome" placeholder="Digite o seu nome" required class="form-control input-lg">
					<input type="text" name="peso" placeholder="Digite o seu peso em kg" class="form-control input-lg">
					<input type="text" name="altura" placeholder="Digite a sua altura em metros" class="form-control input-lg">
					<input type="email" name="email" placeholder="Digite o seu e-mail" required class="form-control input-lg">
					<input type="password" name="senha1" placeholder="Digite a sua senha" required class="form-control input-lg">
					<input type="password" name="senha2" placeholder="Confirme a sua senha" required class="form-control input-lg">
					<section align="right">
						<a href="login.php">
							<button type="button" name="cancelar" class="btn btn-lg btn-default">Cancelar</button>
						</a>
						<button type="submit" name="cadastrar" class="btn btn-lg btn-primary">Cadastrar</button>
					</section>
				</form>
			</div>	
		</div>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
  </body>
</html>