<?php
session_start();
ini_set('default_charset', 'UTF-8');
require_once('db.class.php');

$id = $_SESSION["idUsuario"];

$sql = "delete from usuario where idUsuario = '" .$id. "'";
$objdb = new db();
$link = $objdb->conecta_mysql();
if(mysqli_query($link, $sql)){
unset($_SESSION["nome"]);
unset($_SESSION["senha"]);
unset($_SESSION["email"]);
unset($_SESSION["peso"]);
unset($_SESSION["altura"]);
unset($_SESSION["idUsuario"]);
unset($_SESSION["qtde_dieta"]);
unset($_SESSION["cal_diaria"]);
	header('Location: login.php?cod=2');
}
else{
	header('Location: dados.php?erro=1');
}

?>