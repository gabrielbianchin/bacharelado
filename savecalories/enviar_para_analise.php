<?php
require_once("db.class.php");
ini_set('default_charset', 'UTF-8');
session_start();
$cat = $_POST["nome"];
$sub = $_POST["id_categoria"];
$qtde = $_POST["qtde"];
$id = $_SESSION["idUsuario"];

$sql = "insert into alimento_usuario (nome, calorias_por_100, usuario_idUsuario, tipo_alimento_idTipo) values ('" .$cat. "', '" .$qtde. "', '" .$id. "', '" .$sub. "') ";
$objdb = new db();
$link = $objdb->conecta_mysql();
if(mysqli_query($link, $sql)){
	header('Location: home.php?cod=8');
}
?>