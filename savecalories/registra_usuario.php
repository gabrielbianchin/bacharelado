<?php

require_once('db.class.php');
ini_set('default_charset', 'UTF-8');
$nome = $_POST["nome"];
$peso = isset($_POST["peso"]) ? $_POST["peso"] : null;
$altura = isset($_POST["altura"]) ? $_POST["altura"] : null;
$email = $_POST["email"];
$senha1 = $_POST["senha1"];
$senha2 = $_POST["senha2"];
$data = date('d/m/Y');
$dieta = 2000;

if($senha1 != $senha2){
	header('Location: criarconta.php?erro=1');
}
else{
	$objdb = new db();
	$link = $objdb->conecta_mysql();
	$altura = str_replace(",", ".", $altura);
	$peso = str_replace(",", ".", $peso);
	$senha1 = md5($senha1);
	$senha1 = sha1($senha1);
	$senha1 = strrev($senha1);
	$sql = " insert into usuario(nome, email, peso, altura, senha, data, dieta) values ('" .$nome. "', '" .$email. "', '" .$peso. "', '" .$altura. "', '" .$senha1. "', '" .$data. "', '" .$dieta. "')";
	if(mysqli_query($link, $sql)){
		header('Location: login.php?cod=1');
	}
	else{
		header('Location: criarconta.php?erro=2');
	}
}

?>