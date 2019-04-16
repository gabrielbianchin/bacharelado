<?php
require_once('db.class.php');
ini_set('default_charset', 'UTF-8');
$id = $_POST["id_categoria"];
$nome = $_POST["nome"];
$qtde = $_POST["qtde"];
$sql = "insert into alimento (nome, calorias_por_100, tipo_alimento_idTipo) values ('" .$nome. "', '" .$qtde. "', '" .$id. "')";
$objdb = new db();
$link = $objdb->conecta_mysql();
if(mysqli_query($link,$sql)){
	header('Location: excluir_alterar.php');
}
?>