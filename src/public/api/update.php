<?php
	error_reporting(E_ERROR | E_PARSE);
	header("Access-Control-Allow-Origin: *");
	header("Content-Type: application/json; charset=UTF-8");
	header("Access-Control-Allow-Methods: POST");
	header("Access-Control-Max-Age: 3600");
	header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
	
	include_once '../config/database.php';
	include_once '../class/empresas.php';
	
	$database = new Database();
	$db = $database->getConnection();
	
	$item = new Empresa($db);
	
	$data = json_decode(file_get_contents("php://input"));
	
	$item->id = $data->id;
	
	// empresa values
	$item->nombre = $data->nombre;
	$item->email = $data->email;
	$item->ceo = $data->ceo;
	$item->fecha_creacion = date('Y-m-d H:i:s');
	
	if($item->updateEmpresa()){
		echo json_encode(
			array("message" => "Datos de Empresa actualizados")
		);
	} else{
		echo json_encode(
			array("message" => "Error: No se pudo realizar el actualizado de datos")
		);
	}
?>