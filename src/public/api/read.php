<?php
	header("Access-Control-Allow-Origin: *");
	header("Content-Type: application/json; charset=UTF-8");
	
	include_once '../config/database.php';
	include_once '../class/empresas.php';

	$database = new Database();
	$db = $database->getConnection();

	$items = new Empresa($db);

	$stmt = $items->getEmpresas();
	$itemCount = $stmt->rowCount();

	echo json_encode($itemCount);

	if($itemCount > 0){
		
		$empresaArr = array();
		$empresaArr["body"] = array();
		$empresaArr["itemCount"] = $itemCount;

		while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
			extract($row);
			$e = array(
				"id" => $id,
				"nombre" => $nombre,
				"ceo" => $ceo,
				"email" => $email,
				"fecha_creacion" => $fecha_creacion
			);

			array_push($empresaArr["body"], $e);
		}
		echo json_encode($empresaArr);
	}

	else{
		http_response_code(404);
		echo json_encode(
			array("message" => "No se encontraron registros.")
		);
	}
?>