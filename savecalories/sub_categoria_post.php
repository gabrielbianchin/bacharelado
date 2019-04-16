<?php 
	require_once("db.class.php");
ini_set('default_charset', 'UTF-8');
	$id_categoria = $_REQUEST['id_categoria'];
	
	$result_sub_cat = "SELECT * FROM alimento WHERE tipo_alimento_idTipo = '" .$id_categoria. "' ORDER BY nome";
	$objdb = new db();
    $link = $objdb->conecta_mysql();
	$resultado_sub_cat = mysqli_query($link, $result_sub_cat);
	
	while ($row_sub_cat = mysqli_fetch_assoc($resultado_sub_cat) ) {
		$resultao_sub_cat[] = array(
			'idAlimento'	=> $row_sub_cat['idAlimento'],
			'nome' => utf8_encode($row_sub_cat['nome']),
		);
	}
	
	echo(json_encode($resultao_sub_cat));