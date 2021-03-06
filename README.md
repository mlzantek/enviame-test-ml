# enviame-test-ml
## Repositorio para entrega de resultado para test laboral de enviame para Marco Laso.

## Imagenes para el ambiente en contenedores docker

* mysql:8.0.1
* phpmyadmin:5.1.0-apache
* php:8.0.3-apache

# Dependencias y librerias php

Las dependencias estan ya incluidas en el volumen del ambiente dockerizado del proyecto, como aclaratoria las dependencias vienen ya en la imagen de php y las librerias se incorporaron con uso de composer ejecutando el comando

`composer require fakerphp/faker`

* fakerphp/faker:latest
* mysqli
* pdo
* pdo_mysql

# Instrucciones generales
Cada seccion de ejercicio tiene su instruccion 

## Para facilidad de uso todas las consultas estan agregadas en la siguiente coleccion de postman

Workspace Collection
[![Run in Postman](https://run.pstmn.io/button.svg)](https://app.getpostman.com/run-collection/3052360-51ee2bd9-cd05-4019-ae90-287b2095af9a?action=collection%2Ffork&collection-url=entityId%3D3052360-51ee2bd9-cd05-4019-ae90-287b2095af9a%26entityType%3Dcollection%26workspaceId%3D3e0e5827-94d0-4fe8-8435-cce00606f1b9)

Public link
[![Run in Postman](https://run.pstmn.io/button.svg)](https://www.getpostman.com/collections/1d3d77dfaeffe7997c4b)


# Ejercicio 1: Docker
Instruccion general: 

* Bajar el repositorio a una carpeta de su eleccion
* Desde el directorio raiz de este repositorio, o donde esta el archivo docker-compose.yml correr comando de consola "docker-compose up"

# Ejercicio 2: API REST + CRUD
instruccion: Correr desde postman con los parametros mostrados
* 'GET - http://localhost:8089/api/populate.php' Crea 10 empresas con info falsa/aleatorea
* 'GET - http://localhost:8089/api/read.php' Trae todos las empresas
* 'GET - localhost:8089/api/single_read.php/?id=#' Trae una sola empresa donde # es el id unico de la empresa
* 'POST - http://localhost:8089/api/create.php' Crea una empresa

Json para consulta

`'{
	"nombre":"EvilCorp",
	"email":"correo@gmail.com",
	"ceo":"Policarpo",
	"fecha_creacion":"2012-06-01 02:12:30"
}'`

* 'POST - http://localhost:8089/api/update.php' Actualiza una empresa

Json para consulta

`'{
	"id":"26",
	"nombre":"ECorp",
	"email":"correo@gmail.com",
	"ceo":"Policarpo",
	"fecha_creacion":"2012-06-02 02:12:30"
}'`

* 'POST - localhost:8089/api/delete.php' Borra una empresa

Json para consulta

`'{
	"id":"26"
}'`

# Ejercicio 3: An??lisis + Desarrollo
Crear un script en el lenguaje de tu elecci??n y encuentre la(s) cadena de texto que es(son) igual al rev??s en el siguiente texto:

`afoolishconsistencyisthehobgoblinoflittlemindsadoredbylittlestatesmenandphilosophersanddivineswithconsistencyagreatsoulhassimplynothingtodohemayaswellconcernhimselfwithhisshadowonthewallspeakwhatyouthinknowinhardwordsandtomorrowspeakwhattomorrowthinksinhardwordsagainthoughitcontradicteverythingyousaidtodayahsoyoushallbesuretobemisunderstoodisitsobadthentobemisunderstoodpythagoraswasmisunderstoodandsocratesandjesusandlutherandcopernicusandgalileoandnewtonandeverypureandwisespiritthatevertookfleshtobegreatistobemisunderstood`

* 'GET - http://localhost:8089/scripts/ejercicio3.php' El script corre sin input, el output es la impresion de las cadenas palindromos conseguidas en la cadena de texto.

# Ejercicio 4: Consumo API Env??ame para la creaci??n de un env??o
Desarrolla una funci??n o script que consuma la API Env??ame para la creaci??n de un Env??o y almacene la respuesta en alg??n medio de almacenamiento permanente
* 'GET - http://localhost:8089/scripts/ejercicio4.php' El script corre sin input, el output es la impresion del resultado de la consulta al API enviame, la impresion de los datos tomados del resultado para guardar en base de datos, el indicativo del guardado y la impresion de las ultimas 5 consultas guardadas en la base de datos.

# Ejercicio 5: An??lisis + Desarrollo
Crea un script en tu lenguaje favorito que obtenga el primer n??mero de Fibonacci que tiene m??s de 1000 divisores.

El script esta hecho en python, para correrlo se preparo un contenedor el cual se puede acceder en el directorio 

`/*raiz*/src/ejercicio5py` 

Corriendo el comando en consola: 

`docker build -t script_python .`

Luego de que este montada la imagen correr el comando en consola:

`docker run script_python`

el resultado demora un par de segundos en aparecer, el output es las iteraciones de la serie de fibonacci con una conclucion de cual es el fibonacci que satisface el requerimiento del ejercicio

* Notas: calculo el numero n de la serie fibonacci usando  recursividad con tecnicas de optimizacion de memorizacion

# Ejercicio 6: An??lisis + Desarrollo Aplicado a Negocio
Desarrolla una funci??n o procedimiento que estime el tiempo de entrega de la entrega de una compra online (en d??as)
* 'GET - http://localhost:8089/scripts/ejercicio6.php' El script corre sin input, el output es la impresion de el rango de km de forma aleatorea y los dias que tomaria basandose en la instruccion del ejercicio.

# Ejercicio 7: SQL
Actualizar los sueldos de los empleados que ganen $5000 o menos, de acuerdo al reajuste anual del continente al que pertenecen.

En el directorio siguiente esta el archivo 'sql-ejercicio7.sql' donde se encuentra el query que cumple con el requerimiento

`*raiz*/src/mysql_files/sql-ejercicio7.sql`

El Query en cuestion es

`UPDATE 'employees' em INNER JOIN 'countries' ct ON em.country_id = ct.id INNER JOIN 'continents' cn ON cn.id = ct.continent_id SET em.salary = em.salary +(em.salary *(cn.anual_adjustment / 100)) WHERE em.salary <= 5000`

# Complemento de bases de datos
En el directorio siguiente se encuentran los archivos 

* `tabla-ejercicio2.sql`
* `tabla-ejercicio4.sql`
* `tabla-ejercicio7.sql` 

Cada uno respectivamente tiene los querys para crear y/o popular las tablas usadas para todo el test. Estos archivos son complementarios pero no es necesario correrlos ya que ya estan en el volumen de la base de datos del ambiente dockerizado.

