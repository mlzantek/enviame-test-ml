<?php
	class Envio{

		// Connection
		private $conn;

		// Table
		private $db_table = "envios";

		// Columns
		public $id;
		public $data_identifier;
		public $data_imported_id;
		public $data_tracking_number;
		public $status_id;
		public $status_name;
		public $status_code;
		public $status_info;
		public $status_created_at;
		public $customer_full_name;
		public $customer_phone;
		public $customer_email;
		public $shipping_address_full_address;
		public $shipping_address_place;
		public $shipping_address_type;
		public $country;
		public $carrier;
		public $service;
		public $label_PDF;
		public $label_ZPL;
		public $label_PNG;
		public $barcodes;
		public $deadline_at;
		public $created_at;
		public $updated_at;
		public $links_rel1;
		public $links_href1;
		public $links_rel2;
		public $links_href2;
		public $links_rel3;
		public $links_href3;

		// Db connection
		public function __construct($db){
			$this->conn = $db;
		}

		// GET ALL
		public function getEnvios(){
			$sqlQuery = "SELECT id, data_identifier, data_imported_id, data_tracking_number, status_id, status_name, status_code, status_info, status_created_at, customer_full_name, customer_phone, customer_email, shipping_address_full_address, shipping_address_place, shipping_address_type, country, carrier, service, label_PDF, label_ZPL, label_PNG, barcodes, deadline_at, created_at, updated_at, links_rel1, links_href1, links_rel2, links_href2, links_rel3, links_href3 FROM " . $this->db_table . "";
			$stmt = $this->conn->prepare($sqlQuery);
			$stmt->execute();
			return $stmt;
		}

		// CREATE
		public function createEnvio(){
			$sqlQuery = "INSERT INTO
						". $this->db_table ."
					SET
						data_identifier = :data_identifier,
						data_imported_id = :data_imported_id,
						data_tracking_number = :data_tracking_number,
						status_id = :status_id,
						status_name = :status_name,
						status_code = :status_code,
						status_info = :status_info,
						status_created_at = :status_created_at,
						customer_full_name = :customer_full_name,
						customer_phone = :customer_phone,
						customer_email = :customer_email,
						shipping_address_full_address = :shipping_address_full_address,
						shipping_address_place = :shipping_address_place,
						shipping_address_type = :shipping_address_type,
						country = :country,
						carrier = :carrier,
						service = :service,
						label_PDF = :label_PDF,
						label_ZPL = :label_ZPL,
						label_PNG = :label_PNG,
						barcodes = :barcodes,
						deadline_at = :deadline_at,
						created_at = :created_at,
						updated_at = :updated_at,
						links_rel1 = :links_rel1,
						links_href1 = :links_href1,
						links_rel2 = :links_rel2,
						links_href2 = :links_href2,
						links_rel3 = :links_rel3,
						links_href3 = :links_href3";
		
			$stmt = $this->conn->prepare($sqlQuery);
		
			// sanitize
			$this->data_identifier=htmlspecialchars(strip_tags($this->data_identifier));
			$this->data_imported_id=htmlspecialchars(strip_tags($this->data_imported_id));
			$this->data_tracking_number=htmlspecialchars(strip_tags($this->data_tracking_number));
			$this->status_id=htmlspecialchars(strip_tags($this->status_id));
			$this->status_name=htmlspecialchars(strip_tags($this->status_name));
			$this->status_code=htmlspecialchars(strip_tags($this->status_code));
			$this->status_info=htmlspecialchars(strip_tags($this->status_info));
			$this->status_created_at=htmlspecialchars(strip_tags($this->status_created_at));
			$this->customer_full_name=htmlspecialchars(strip_tags($this->customer_full_name));
			$this->customer_phone=htmlspecialchars(strip_tags($this->customer_phone));
			$this->customer_email=htmlspecialchars(strip_tags($this->customer_email));
			$this->shipping_address_full_address=htmlspecialchars(strip_tags($this->shipping_address_full_address));
			$this->shipping_address_place=htmlspecialchars(strip_tags($this->shipping_address_place));
			$this->shipping_address_type=htmlspecialchars(strip_tags($this->shipping_address_type));
			$this->country=htmlspecialchars(strip_tags($this->country));
			$this->carrier=htmlspecialchars(strip_tags($this->carrier));
			$this->service=htmlspecialchars(strip_tags($this->service));
			$this->label_PDF=htmlspecialchars(strip_tags($this->label_PDF));
			$this->label_ZPL=htmlspecialchars(strip_tags($this->label_ZPL));
			$this->label_PNG=htmlspecialchars(strip_tags($this->label_PNG));
			$this->barcodes=htmlspecialchars(strip_tags($this->barcodes));
			$this->deadline_at=htmlspecialchars(strip_tags($this->deadline_at));
			$this->created_at=htmlspecialchars(strip_tags($this->created_at));
			$this->updated_at=htmlspecialchars(strip_tags($this->updated_at));
			$this->links_rel1=htmlspecialchars(strip_tags($this->links_rel1));
			$this->links_href1=htmlspecialchars(strip_tags($this->links_href1));
			$this->links_rel2=htmlspecialchars(strip_tags($this->links_rel2));
			$this->links_href2=htmlspecialchars(strip_tags($this->links_href2));
			$this->links_rel3=htmlspecialchars(strip_tags($this->links_rel3));
			$this->links_href3=htmlspecialchars(strip_tags($this->links_href3));
		
			// bind data
			$stmt->bindParam(":data_identifier", $this->data_identifier);
			$stmt->bindParam(":data_imported_id", $this->data_imported_id);
			$stmt->bindParam(":data_tracking_number", $this->data_tracking_number);
			$stmt->bindParam(":status_id", $this->status_id);
			$stmt->bindParam(":status_name", $this->status_name);
			$stmt->bindParam(":status_code", $this->status_code);
			$stmt->bindParam(":status_info", $this->status_info);
			$stmt->bindParam(":status_created_at", $this->status_created_at);
			$stmt->bindParam(":customer_full_name", $this->customer_full_name);
			$stmt->bindParam(":customer_phone", $this->customer_phone);
			$stmt->bindParam(":customer_email", $this->customer_email);
			$stmt->bindParam(":shipping_address_full_address", $this->shipping_address_full_address);
			$stmt->bindParam(":shipping_address_place", $this->shipping_address_place);
			$stmt->bindParam(":shipping_address_type", $this->shipping_address_type);
			$stmt->bindParam(":country", $this->country);
			$stmt->bindParam(":carrier", $this->carrier);
			$stmt->bindParam(":service", $this->service);
			$stmt->bindParam(":label_PDF", $this->label_PDF);
			$stmt->bindParam(":label_ZPL", $this->label_ZPL);
			$stmt->bindParam(":label_PNG", $this->label_PNG);
			$stmt->bindParam(":barcodes", $this->barcodes);
			$stmt->bindParam(":deadline_at", $this->deadline_at);
			$stmt->bindParam(":created_at", $this->created_at);
			$stmt->bindParam(":updated_at", $this->updated_at);
			$stmt->bindParam(":links_rel1", $this->links_rel1);
			$stmt->bindParam(":links_href1", $this->links_href1);
			$stmt->bindParam(":links_rel2", $this->links_rel2);
			$stmt->bindParam(":links_href2", $this->links_href2);
			$stmt->bindParam(":links_rel3", $this->links_rel3);
			$stmt->bindParam(":links_href3", $this->links_href3);

			if($stmt->execute()){
			   return true;
			}
			return false;
		}

		// UPDATE
		public function getLatestEnvio(){
			$sqlQuery = "SELECT
						id, data_identifier, data_imported_id, data_tracking_number, status_id, status_name, status_code, status_info, status_created_at, customer_full_name, customer_phone, customer_email, shipping_address_full_address, shipping_address_place, shipping_address_type, country, carrier, service, label_PDF, label_ZPL, label_PNG, barcodes, deadline_at, created_at, updated_at, links_rel1, links_href1, links_rel2, links_href2, links_rel3, links_href3
					  FROM
						". $this->db_table ."
					ORDER BY id DESC LIMIT 0,5";

			$stmt = $this->conn->prepare($sqlQuery);
			$stmt->execute();

			$dataRow = $stmt->fetch(PDO::FETCH_ASSOC);
			
			$this->data_identifier = $dataRow['data_identifier'];
			$this->data_imported_id = $dataRow['data_imported_id'];
			$this->data_tracking_number = $dataRow['data_tracking_number'];
			$this->status_id = $dataRow['status_id'];
			$this->status_name = $dataRow['status_name'];
			$this->status_code = $dataRow['status_code'];
			$this->status_info = $dataRow['status_info'];
			$this->status_created_at = $dataRow['status_created_at'];
			$this->customer_full_name = $dataRow['customer_full_name'];
			$this->customer_phone = $dataRow['customer_phone'];
			$this->customer_email = $dataRow['customer_email'];
			$this->shipping_address_full_address = $dataRow['shipping_address_full_address'];
			$this->shipping_address_place = $dataRow['shipping_address_place'];
			$this->shipping_address_type = $dataRow['shipping_address_type'];
			$this->country = $dataRow['country'];
			$this->carrier = $dataRow['carrier'];
			$this->service = $dataRow['service'];
			$this->label_PDF = $dataRow['label_PDF'];
			$this->label_ZPL = $dataRow['label_ZPL'];
			$this->label_PNG = $dataRow['label_PNG'];
			$this->barcodes = $dataRow['barcodes'];
			$this->deadline_at = $dataRow['deadline_at'];
			$this->created_at = $dataRow['created_at'];
			$this->updated_at = $dataRow['updated_at'];
			$this->links_rel1 = $dataRow['links_rel1'];
			$this->links_href1 = $dataRow['links_href1'];
			$this->links_rel2 = $dataRow['links_rel2'];
			$this->links_href2 = $dataRow['links_href2'];
			$this->links_rel3 = $dataRow['links_rel3'];
			$this->links_href3 = $dataRow['links_href3'];
			return $stmt;
		}      

	}
?>

