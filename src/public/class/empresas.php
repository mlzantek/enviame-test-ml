<?php
	class Empresa{

		// Connection
		private $conn;

		// Table
		private $db_table = "empresa";

		// Columns
		public $id;
		public $nombre;
		public $email;
		public $ceo;
		public $fecha_creacion;

		// Db connection
		public function __construct($db){
			$this->conn = $db;
		}

		// GET ALL
		public function getEmpresas(){
			$sqlQuery = "SELECT id, nombre, email, ceo, fecha_creacion FROM " . $this->db_table . "";
			$stmt = $this->conn->prepare($sqlQuery);
			$stmt->execute();
			return $stmt;
		}

		// CREATE
		public function createEmpresa(){
			$sqlQuery = "INSERT INTO
						". $this->db_table ."
					SET
						nombre = :nombre, 
						email = :email, 
						ceo = :ceo, 
						fecha_creacion = :fecha_creacion";
		
			$stmt = $this->conn->prepare($sqlQuery);
		
			// sanitize
			$this->nombre=htmlspecialchars(strip_tags($this->nombre));
			$this->email=htmlspecialchars(strip_tags($this->email));
			$this->ceo=htmlspecialchars(strip_tags($this->ceo));
			$this->fecha_creacion=htmlspecialchars(strip_tags($this->fecha_creacion));
		
			// bind data
			$stmt->bindParam(":nombre", $this->nombre);
			$stmt->bindParam(":email", $this->email);
			$stmt->bindParam(":ceo", $this->ceo);
			$stmt->bindParam(":fecha_creacion", $this->fecha_creacion);
		
			if($stmt->execute()){
			   return true;
			}
			return false;
		}

		// UPDATE
		public function getSingleEmpresa(){
			$sqlQuery = "SELECT
						id, 
						nombre, 
						email, 
						ceo, 
						fecha_creacion
					  FROM
						". $this->db_table ."
					WHERE 
					   id = ?
					LIMIT 0,1";

			$stmt = $this->conn->prepare($sqlQuery);

			$stmt->bindParam(1, $this->id);

			$stmt->execute();

			$dataRow = $stmt->fetch(PDO::FETCH_ASSOC);
			
			$this->nombre = $dataRow['nombre'];
			$this->email = $dataRow['email'];
			$this->ceo = $dataRow['ceo'];
			$this->fecha_creacion = $dataRow['fecha_creacion'];
		}        

		// UPDATE
		public function updateEmpresa(){
			$sqlQuery = "UPDATE
						". $this->db_table ."
					SET
						nombre = :nombre, 
						email = :email, 
						ceo = :ceo,  
						fecha_creacion = :fecha_creacion
					WHERE 
						id = :id";
		
			$stmt = $this->conn->prepare($sqlQuery);
		
			$this->nombre=htmlspecialchars(strip_tags($this->nombre));
			$this->email=htmlspecialchars(strip_tags($this->email));
			$this->ceo=htmlspecialchars(strip_tags($this->ceo));
			$this->fecha_creacion=htmlspecialchars(strip_tags($this->fecha_creacion));
			$this->id=htmlspecialchars(strip_tags($this->id));
		
			// bind data
			$stmt->bindParam(":nombre", $this->nombre);
			$stmt->bindParam(":email", $this->email);
			$stmt->bindParam(":ceo", $this->ceo);
			$stmt->bindParam(":fecha_creacion", $this->fecha_creacion);
			$stmt->bindParam(":id", $this->id);
		
			if($stmt->execute()){
			   return true;
			}
			return false;
		}

		// DELETE
		function deleteEmpresa(){
			$sqlQuery = "DELETE FROM " . $this->db_table . " WHERE id = ?";
			$stmt = $this->conn->prepare($sqlQuery);
		
			$this->id=htmlspecialchars(strip_tags($this->id));
		
			$stmt->bindParam(1, $this->id);
		
			if($stmt->execute()){
				return true;
			}
			return false;
		}

	}
?>

