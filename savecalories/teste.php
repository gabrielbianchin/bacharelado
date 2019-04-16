<?php
 require_once('db.class.php');
 session_start();
 $id = $_SESSION["idUsuario"];
$nome = $_POST["nome"];
$res = $_POST["alimento"];
$qtde = $_POST["qtde"];
$cal_total = 0;
while($res){
  $valor = array_shift($res);
  $k = array_shift($qtde);
  $sql = "select * from alimento where idAlimento = '" .$valor. "' ";
  $objdb = new db();
  $link = $objdb->conecta_mysql();
  $kappa = mysqli_query($link, $sql);
  $keppo = mysqli_fetch_array($kappa);
  $n = $keppo["calorias_por_100"];
  $n = $n * $k;
  $cal_total += $n;
}
$sql = "insert into prato (nome, qtde_calorias, usuario_idUsuario) values ('" .$nome. "', '" .$cal_total."', '" .$id. "')";
$objdb = new db();
$link = $objdb->conecta_mysql();
if(mysqli_query($link, $sql)){
  header('Location: prato.php');
}
?>