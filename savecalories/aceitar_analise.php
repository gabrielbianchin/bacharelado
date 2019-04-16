<?php
require_once('db.class.php');
ini_set('default_charset', 'UTF-8');
$id = $_GET["id"];
$sql = "select * from alimento_usuario where idAlim_usu = '" .$id. "'";
$objdb = new db();
$link = $objdb->conecta_mysql();
$res = mysqli_query($link, $sql);
while($row = mysqli_fetch_array($res)){
$nome = $row["nome"];
$qtde = $row["calorias_por_100"];
$tipo = $row["tipo_alimento_idTipo"];
}
$sql = "insert into alimento (nome, calorias_por_100, tipo_alimento_idTipo) values ('" .$nome. "', '" .$qtde. "', '" .$tipo. "')";
$objdb = new db();
$link = $objdb->conecta_mysql();
if(mysqli_query($link, $sql)){
	$sql = "delete from alimento_usuario where idAlim_usu = '" .$id. "'";
	$objdb = new db();
	$link = $objdb->conecta_mysql();
	if(mysqli_query($link,$sql)){
		header('Location: analise.php');
	}
}
?>