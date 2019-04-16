<?php
require_once("db.class.php");
ini_set('default_charset', 'UTF-8');
session_start();
$cat = $_POST["id_categoria"];
$sub = $_POST["id_sub_categoria"];
$qtde = $_POST["qtde"];

$sql = " select nome_tipo from tipo_alimento where idTipo = '" .$cat. "'";
$objdb = new db();
$link = $objdb->conecta_mysql();
$res = mysqli_query($link, $sql);
while($row = mysqli_fetch_array($res)){
   echo 'Tipo = '.$row['nome_tipo'].'<br>';
}

$sql = " select nome, calorias_por_100 from alimento where idAlimento = '" .$sub. "'";
$objdb = new db();
$link = $objdb->conecta_mysql();
$res = mysqli_query($link, $sql);
while($row = mysqli_fetch_array($res)){
	$valor = $row['calorias_por_100'];
   echo 'Tipo = '.$row['nome'].'<br>';
}

$qtde = $qtde * $valor;
$atual = $_SESSION["cal_diaria"];
$atual = $qtde + $atual;
$id = $_SESSION["idUsuario"];
$sql = " update usuario set calorias = '" .$atual. "' where idUsuario = '" .$id. "'";
$objdb = new db();
$link = $objdb->conecta_mysql();
if(mysqli_query($link, $sql)){
	$_SESSION["cal_diaria"] = $atual;
}
header('Location: home.php')
?>