<?php

session_start();
ini_set('default_charset', 'UTF-8');
require_once('db.class.php');

$nome = $_POST["nome"];
$peso = isset($_POST["peso"]) ? $_POST["peso"] : null;
$altura = isset($_POST["altura"]) ? $_POST["altura"] : null;
$email = $_POST["email"];
$id = $_SESSION["idUsuario"];
$dieta = $_POST["dieta"];

if($senha1 != $senha2){
	header('Location: alteradados.php?erro=1');
}
else{
	$altura = str_replace(",", ".", $altura);
	$peso = str_replace(",", ".", $peso);
	$sql = "update usuario set nome = '" . $nome. "', peso = '" .$peso. "', altura = '" .$altura. "', email = '" .$email. "', dieta = '" .$dieta. "' where idUsuario = '" .$id. "'";
	$objdb = new db();
	$link = $objdb->conecta_mysql();
	if(mysqli_query($link, $sql)){
		$_SESSION["nome"] = $nome;
		$_SESSION["email"] = $email;
		$_SESSION["peso"] = $peso;
		$_SESSION["altura"] = $altura;
		$_SESSION["senha"] = $senha1;
		$_SESSION["qtde_dieta"] = $dieta;
		header('Location: dados.php?cod=1');
	}
	else{
		header('Location: alteradados.php?erro=2');
	}
}

?>