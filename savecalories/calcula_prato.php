<?php
	require_once('db.class.php');
	ini_set('default_charset', 'UTF-8');
	session_start();
	$id = $_POST["id_prato"];
	$idu = $_SESSION["idUsuario"];
	$sql = " select * from prato where usuario_idUsuario = '" .$idu. "' and idPrato = '" .$id. "'";
	$objdb = new db();
	$link = $objdb->conecta_mysql();
	$res = mysqli_query($link, $sql);
	$qtde_calorias = mysqli_fetch_array($res);
	$qtde = $qtde_calorias["qtde_calorias"];
	$atual = $_SESSION["cal_diaria"];
	$atual = $qtde + $atual;
	$sql = " update usuario set calorias = '" .$atual. "' where idUsuario = '" .$idu. "'";
	$objdb = new db();
	$link = $objdb->conecta_mysql();
	if(mysqli_query($link, $sql)){
		$_SESSION["cal_diaria"] = $atual;
	}
	header('Location: home.php')
?>