<?php
	echo nl2br("\n# enviame-test-ml\n");
	echo nl2br("\nRepositorio para entrega de resultado para test laboral de enviame para Marco Laso.\n");

	echo nl2br("\n// Imagenes para el ambiente en contenedores docker\n");

	echo nl2br("\nmysql:8.0.1\n");
	echo nl2br("\nphpmyadmin:5.1.0-apache\n");

	echo nl2br("\n// php Dependencias\n");
	echo nl2br("\nfakerphp/faker:latest\n");

	echo nl2br("\n// Instrucciones\n");

	echo nl2br("\n# Para requerimiento 1\n");
	echo nl2br("\ndesde directorio /enviame-test correr comando 'docker-compose up'\n");

	echo nl2br("\n# Para requerimiento 2\n");
	echo nl2br("\n## PHP CRUD API\n");
	echo nl2br("\n* `GET - http://localhost:8089/api/populate.php` Crea 10 empresas con info falsa/aleatorea\n");
	echo nl2br("\n* `GET - http://localhost:8089/api/read.php` Trae todos las empresas\n");
	echo nl2br("\n* `GET - localhost:8089/api/single_read.php/?id=#` Trae una sola empresa donde # es el id unico de la empresa\n");
	echo nl2br("\n* `POST - http://localhost:8089/api/create.php` Crea una empresa\n");
	echo "<pre>",print_r('{
   "nombre":"Enviame",
   "email":"correo@gmail.com",
   "ceo":"Policarpo",
   "fecha_creacion":"2012-06-01 02:12:30"
	}'),"</pre>";
	echo nl2br("\n* `POST - http://localhost:8089/api/update.php` Actualiza los datos de una empresa\n");
	echo "<pre>",print_r('{
   "id":"26",
   "nombre":"Enviame",
   "email":"correo@gmail.com",
   "ceo":"Policarpo",
   "fecha_creacion":"2012-06-01 02:12:30"
	}'),"</pre>";
	echo nl2br("\n* `DELETE - localhost:8089/api/delete.php` Elimina una empresa\n");
	echo "<pre>",print_r('{
   "id":"26"
	}'),"</pre>";
?>