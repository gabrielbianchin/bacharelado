<?php
require_once('db.class.php');
ini_set('default_charset', 'UTF-8');
$id = $_GET["id"];
$nome = $_POST["nome"];
$qtde = $_POST["qtde"];
$sql = "update alimento set nome = '" .$nome. "', calorias_por_100 = '" .$qtde. "' where idAlimento = '" .$id. "' ";
$objdb = new db();
$link = $objdb->conecta_mysql();
if(mysqli_query($link,$sql)){
	header('Location: excluir_alterar.php');
}
?>