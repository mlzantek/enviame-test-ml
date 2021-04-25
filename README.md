# enviame-test-ml
Repositorio para entrega de resultado para test laboral de enviame para Marco Laso.

// Imagenes para el ambiente en contenedores docker

mysql:8.0.1
phpmyadmin:5.1.0-apache

// php Dependencias
fakerphp/faker:latest

// Instrucciones

# Para requerimiento 1
desde directorio /enviame-test correr comando "docker-compose up"

# Para requerimiento 2
## PHP CRUD API
* `GET - http://localhost:8089/api/populate.php` Crea 10 empresas con info falsa/aleatorea
* `GET - http://localhost:8089/api/read.php` Trae todos las empresas
* `GET - localhost:8089/api/single_read.php/?id=#` Trae una sola empresa donde # es el id unico de la empresa
* `POST - http://localhost:8089/api/create.php` Crea una empresa
* `POST - http://localhost:8089/api/update.php` Update Record
* `DELETE - localhost:8089/api/delete.php` Remove Records