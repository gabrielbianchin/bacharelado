<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Página Principal - B&B - Save Calories</title>

	<link rel="stylesheet" type="text/css" href="estilo.css">
    <!-- jquery - link cdn -->
    <script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>

    <!-- bootstrap - link cdn -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  </head>
  <body class="fundo_imagem">
    <nav class="navbar navegacao navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          	<button type="button" class="navbar-toggle collapsed botao_telamenor" data-toggle="collapse" data-target="#barra-navegacao">
				<span class="sr-only">Alternar menu</span>
				<span class="icon-bar" style="background: white;"></span>
				<span class="icon-bar" style="background: white;"></span>
				<span class="icon-bar" style="background: white;"></span>
			     </button>
			<a href="index.php" class="navbar-brand paginainicial-logo">
				<img src="imagens/logo.png" class="foto-logo" style="background-color: white;">
			</a>
        </div>
        <div class="collapse navbar-collapse" id="barra-navegacao">
          <ul class="nav navbar-nav navbar-right">
            <li> <a href="premium.php">Premium</a> </li>
            <li> <a href="criarconta.php">Cadastre-se</a> </li>
            <li> <a href="login.php">Entrar</a> </li>
          </ul>
        </div>
      </div>
    </nav> <!-- fim da barra de navegacao -->
	
   <div class="container">
   		 <div class="row titulo_principal">
            <div class="row" align="center" style="margin-top: 30px;">
                <div class="col-xs-12">
                    <img src="imagens/logo.png" class="img-responsive" width="230px">
                </div>
                <div class="col-xs-12" style="margin-top: 30px;">
                    <a href="premium.php">
                        <button type="button" class="btn botao_premium btn-lg" style="margin-top: 15px;">Obter o Premium</button>
                    </a>
                    <a href="criarconta.php">
                        <button type="button" class="btn botao_premium btn-lg" style="margin-top: 15px;">Cadastrar agora</button>
                    </a>
                </div>
            </div>
		    </div>
    </div>
		
    <section class="capa">
      <div class="row">
			   <div class="row col-md-6">
				    <img src="imagens/fundo_login.jpg" class="img-responsive">
			   </div>
			   <div class="row col-md-6" style="margin-left: 10px;">
				    <h2 style="color: blue;">  O que é Save Calories?</h2>
				    <h3>  Save Calories é o seu novo site que calcula as calorias diárias através de seus pratos cadastrados.</h3>
				    <h2 style="color: blue;">  Como eu faço isso?</h2>
				    <h3>  Você consegue criar pratos que mais consome, ou apenas usar alimentos cadastrados.</h3>
			   </div>
		  </div>
	</section>

  <section class="rodape_inicial">
	   <div align="center" style="color: white; margin-top: -35px; ">
		    &copy;2017 - B&B - Save Calories
	   </div>
  </section >
    
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script> 
  </body>
</html>