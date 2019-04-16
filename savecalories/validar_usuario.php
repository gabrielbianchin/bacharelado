<?php  

session_start();
ini_set('default_charset', 'UTF-8');
require_once('db.class.php');


$email = $_POST["email"];
$senha = $_POST["senha"];
$senha = md5($senha);
$senha = sha1($senha);
$senha = strrev($senha);
$sql = " select * from usuario where email = '" .$email. "' and senha = '" .$senha. "' ";
$objdb = new db();
$link = $objdb->conecta_mysql();
$resultado_id = mysqli_query($link, $sql);

if($resultado_id){	
	$dados_usuario = mysqli_fetch_array($resultado_id);
	if(isset($dados_usuario["idUsuario"])){
		$_SESSION["nome"] = $dados_usuario["nome"];
		$_SESSION["email"] = $dados_usuario["email"];
		$_SESSION["peso"] = $dados_usuario["peso"];
		$_SESSION["altura"] = $dados_usuario["altura"];
		$_SESSION["senha"] = $dados_usuario["senha"];
		$_SESSION["data"] = $dados_usuario["data"];
		$_SESSION["idUsuario"] = $dados_usuario["idUsuario"];
		$_SESSION["qtde_dieta"] = $dados_usuario["dieta"];
		$data_atual = date('d/m/Y');
		$id = $_SESSION["idUsuario"];
		if($dados_usuario["ultimo_acesso"] != $data_atual){
			$sql = " update usuario set ultimo_acesso = '$data_atual' where idUsuario = '" .$id. "'";
			$objdb = new db();
			$link = $objdb->conecta_mysql();
			if(mysqli_query($link, $sql)){
				$_SESSION["cal_diaria"] = 0;
			}
		}
		else{
			$_SESSION["cal_diaria"] = $dados_usuario["calorias"];
		}
		if($email != "root@root" && $senha != "dacec6dbe5cf9a87b099e46f4fc08f52e7aa9b09"){
			header('Location: home.php');
		}
		else{
			header('Location: admin_home.php');
		}
	}
	else{
		header('Location: login.php?erro=1');
	}
}


?>