<?php
	include_once '../config/database.php';
	include_once '../class/envios.php';

	$curl = curl_init();

	curl_setopt_array($curl, 
		array(
		  CURLOPT_URL => 'https://stage.api.enviame.io/api/s2/v2/companies/401/deliveries',
		  CURLOPT_RETURNTRANSFER => true,
		  CURLOPT_ENCODING => '',
		  CURLOPT_MAXREDIRS => 10,
		  CURLOPT_TIMEOUT => 0,
		  CURLOPT_FOLLOWLOCATION => true,
		  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		  CURLOPT_CUSTOMREQUEST => 'POST',
		  CURLOPT_POSTFIELDS =>'{
		    "shipping_order": {
		      "n_packages": 1,
		      "content_description": "ORDEN 255826267",
		      "imported_id": "255826267",
		      "order_price": "24509.0",
		      "weight": "0.98",
		      "volume": "1.0",
		      "type": "delivery"
		    },
		    "shipping_origin": {
		      "warehouse_code": "401"
		    },
		    "shipping_destination": {
		      "customer": {
		        "name": "Bernardita Tapia Riquelme",
		        "email": "b.tapia@outlook.com",
		        "phone": "977623070"
		      },
		      "delivery_address": {
		        "home_address": {
		          "place": "Puente Alto",
		          "full_address": "SAN HUGO 01324, Puente Alto, Puente Alto"
		        }
		      }
		    },
		    "carrier": {
		      "carrier_code": "BLX",
		      "tracking_number": ""
		    }
			}',
		  CURLOPT_HTTPHEADER => array(
		    'Accept: application/json',
		    'api-key: ea670047974b650bbcba5dd759baf1ed',
		    'Content-Type: application/json'
		  ),
		)
	);

	$response = curl_exec($curl);

	curl_close($curl);
	echo ("Respuesta al consumir el API de enviame:");
	echo "<pre>",print_r(json_decode($response)),"</pre>";
	
	// Guardo la respuesta de la consulta en base de datos
	$database = new Database();
	$db = $database->getConnection();

	$item = new Envio($db);
	$response = json_decode($response);

	$item->data_identifier = $response->data->identifier;
	$item->data_imported_id = $response->data->imported_id;
	$item->data_tracking_number = $response->data->tracking_number;
	$item->status_id = $response->data->status->id;
	$item->status_name = $response->data->status->name;
	$item->status_code = $response->data->status->code;
	$item->status_info = $response->data->status->info;
	$item->status_created_at = $response->data->status->created_at;
	$item->customer_full_name = $response->data->customer->full_name;
	$item->customer_phone = $response->data->customer->phone;
	$item->customer_email = $response->data->customer->email;
	$item->shipping_address_full_address = $response->data->shipping_address->full_address;
	$item->shipping_address_place = $response->data->shipping_address->place;
	$item->shipping_address_type = $response->data->shipping_address->type;
	$item->country = $response->data->country;
	$item->carrier = $response->data->carrier;
	$item->service = $response->data->service;
	$item->label_PDF = $response->data->label->PDF;
	$item->label_ZPL = $response->data->label->ZPL;
	$item->label_PNG = $response->data->label->PNG;
	$item->barcodes = $response->data->barcodes;
	$item->deadline_at = $response->data->deadline_at;
	$item->created_at = $response->data->created_at;
	$item->updated_at = $response->data->updated_at;
	$item->links_rel1 = $response->data->links[0]->rel;
	$item->links_href1 = $response->data->links[0]->href;
	$item->links_rel2 = $response->data->links[1]->rel;
	$item->links_href2 = $response->data->links[1]->href;
	$item->links_rel3 = $response->data->links[2]->rel;
	$item->links_href3 = $response->data->links[2]->href;
	echo ("Datos a guardar en base de datos de envios:");
	echo "<pre>",print_r($item),"</pre>";
	if($item->createEnvio()){
		echo ("Envio guardado con exito!");
	} else{
		echo ("Error: El envio no pudo ser guardado.");
	}

	echo ("Los ultimos 5 envios guardados son:");
	$items = new Envio($db);

	$stmt = $items->getLatestEnvio();
	$itemCount = $stmt->rowCount();

	if($itemCount > 0){
		
		$envioArr = array();
		$envioArr["Envios"] = array();
		$envioArr["Cantidad"] = $itemCount;

		while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
			extract($row);
			$e = array(
				"id" => $id,
				"data_identifier" => $data_identifier,
				"data_imported_id" => $data_imported_id,
				"data_tracking_number" => $data_tracking_number,
				"status_id" => $status_id,
				"status_name" => $status_name,
				"status_code" => $status_code,
				"status_info" => $status_info,
				"status_created_at" => $status_created_at,
				"customer_full_name" => $customer_full_name,
				"customer_phone" => $customer_phone,
				"customer_email" => $customer_email,
				"shipping_address_full_address" => $shipping_address_full_address,
				"shipping_address_place" => $shipping_address_place,
				"shipping_address_type" => $shipping_address_type,
				"country" => $country,
				"carrier" => $carrier,
				"service" => $service,
				"label_PDF" => $label_PDF,
				"label_ZPL" => $label_ZPL,
				"label_PNG" => $label_PNG,
				"barcodes" => $barcodes,
				"deadline_at" => $deadline_at,
				"created_at" => $created_at,
				"updated_at" => $updated_at,
				"links_rel1" => $links_rel1,
				"links_href1" => $links_href1,
				"links_rel2" => $links_rel2,
				"links_href2" => $links_href2,
				"links_rel3" => $links_rel3,
				"links_href3" => $links_href3,
			);

			array_push($envioArr["Envios"], $e);
		}
		echo "<pre>",print_r($envioArr),"<pre>";
	}else{
		echo "<pre>",print_r(array("message" => "No se encontraron registros de envios.")),"<pre>";
	}

?>

