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
	
	if($item->deleteEmpresa()){
		echo json_encode(
			array("message" => "Empresa eliminada con exito")
		);
	} else{
		echo json_encode(
			array("message" => "Error: La empresa no pudo ser eliminada")
		);
	}
?>