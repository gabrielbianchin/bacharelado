<?php

session_start();
ini_set('default_charset', 'UTF-8');
require_once('db.class.php');

$senha1 = $_POST["senha1"];
$senha2 = $_POST["senha2"];
$senha = $_SESSION["senha"];
$senha1 = md5($senha1);
$senha1 = sha1($senha1);
$senha1 = strrev($senha1);
$senha2 = md5($senha2);
$senha2 = sha1($senha2);
$senha2 = strrev($senha2);
echo $senha;
echo $senha1;
$id = $_SESSION["idUsuario"];
if($senha1 != $senha){
	header('Location: trocasenha.php?erro=1');
}
else{
	$sql = "update usuario set senha = '" .$senha2. "' where idUsuario = '" .$id. "'";
	$objdb = new db();
	$link = $objdb->conecta_mysql();
	if(mysqli_query($link, $sql)){
		$_SESSION["senha"] = $senha2;
		header('Location: dados.php?cod=1');
	}
}

?>