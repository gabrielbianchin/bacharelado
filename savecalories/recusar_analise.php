<?php
require_once('db.class.php');
ini_set('default_charset', 'UTF-8');
$id = $_GET["id"];
$sql = "delete from alimento_usuario where idAlim_usu = '" .$id. "'";
$objdb = new db();
$link = $objdb->conecta_mysql();
if(mysqli_query($link,$sql)){
	header('Location: analise.php');
}
?>