<?php
	header("Access-Control-Allow-Origin: *");
	header("Content-Type: application/json; charset=UTF-8");
	header("Access-Control-Allow-Methods: POST");
	header("Access-Control-Max-Age: 3600");
	header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

	include_once '../config/database.php';
	include_once '../class/empresas.php';
	require_once '../vendor/autoload.php';

	$database = new Database();
	$db = $database->getConnection();

	$item = new Empresa($db);

	// use the factory to create a Faker\Generator instance
	$faker = Faker\Factory::create();
	// generate data by calling methods
	for ($i=0; $i < 10; $i++) { 
		$item->nombre = $faker->company();
		$item->ceo = $faker->name();
		$item->email = $faker->email();
		$item->fecha_creacion = date('Y-m-d H:i:s');
		$item->createEmpresa();
	}
	echo 'Base de datos populada con 10 empresas!';
?>