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
    <title>Alimentos - B&B - Save Calories</title>

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

    <div class="container" style="margin-top: 300px;">
      <div class="row">
        <div class="col-lg-2 col-md-0 col-sm-0"></div>
        <div class="col-lg-8 col-md-12 col-sm-12" style="align-self: center;">
          <form method="post" action="calcula_caloria.php">
            <div class="col-md-4 col-sm-4 col-xs-12">
            <select id="id_categoria" name="id_categoria" class="form-control">
              <option value="">Escolha o tipo</option>
              <?php
                $sql = " select * from tipo_alimento order by nome_tipo";
                $objdb = new db();
                $link = $objdb->conecta_mysql();
                mysqli_set_charset($link,"utf8");
                $res = mysqli_query($link, $sql);
                while($row = mysqli_fetch_array($res)){
                  echo '<option value="'.$row['idTipo'].'">'.$row['nome_tipo'].'</option>';
                }
              ?>
            </select>
            </div>
            <div class="col-sm-4 col-xs-12">
            <select name="id_sub_categoria" id="id_sub_categoria" class="form-control">
              <option value="">Escolha o alimento</option>
            </select>
            </div>
            <div class="col-sm-4 col-xs-12">
            <input type="text" name="qtde" placeholder="Digite a quantidade" class="form-control">
            </div>
            <br>

            <div class="col-sm-8 col-xs-0"></div>
            <div class="col-sm-4 col-xs-12">
            <button class="btn btn-info btn-large btn-block" type="submit" style="margin-top: 15px;">Enviar</button>
            </div>
          </form>
        </div>
          <script type="text/javascript" src="https://www.google.com/jsapi"></script>
          <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>
          <!-- jquery - link cdn -->
    <script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>
          <script type="text/javascript">
          $(function(){
            $('#id_categoria').change(function(){
              if( $(this).val() ) {
                $('#id_sub_categoria').hide();
                $.getJSON('sub_categoria_post.php?search=',{id_categoria: $(this).val(), ajax: 'true'}, function(j){
                  var options = '<option value="">Escolha o alimento</option>'; 
                  for (var i = 0; i < j.length; i++) {
                    options += '<option value="' + j[i].idAlimento + '">' + j[i].nome + '</option>';
                  } 
                  $('#id_sub_categoria').html(options).show();
                });
              } 
              else {
                $('#id_sub_categoria').html('<option value="">Escolha o alimento</option>');
              }
            });
          });
          </script>
          <!-- Latest compiled and minified JavaScript -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.4/js/bootstrap-select.min.js"></script>
        <div class="col-lg-2 col-md-3 col-sm-4"></div>
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