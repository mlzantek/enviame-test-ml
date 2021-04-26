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

[![Run in Postman](https://run.pstmn.io/button.svg)](https://www.getpostman.com/collections/1d3d77dfaeffe7997c4b)


# Ejercicio 1: Docker
Instruccion: Desde directorio /enviame-test correr comando "docker-compose up"

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

# Ejercicio 3: Análisis + Desarrollo
Crear un script en el lenguaje de tu elección y encuentre la(s) cadena de texto que es(son) igual al revés en el siguiente texto:

`afoolishconsistencyisthehobgoblinoflittlemindsadoredbylittlestatesmenandphilosophersanddivineswithconsistencyagreatsoulhassimplynothingtodohemayaswellconcernhimselfwithhisshadowonthewallspeakwhatyouthinknowinhardwordsandtomorrowspeakwhattomorrowthinksinhardwordsagainthoughitcontradicteverythingyousaidtodayahsoyoushallbesuretobemisunderstoodisitsobadthentobemisunderstoodpythagoraswasmisunderstoodandsocratesandjesusandlutherandcopernicusandgalileoandnewtonandeverypureandwisespiritthatevertookfleshtobegreatistobemisunderstood`

* 'GET - http://localhost:8089/scripts/ejercicio3.php' El script corre sin input, el output es la impresion de las cadenas palindromos conseguidas en la cadena de texto.

# Ejercicio 4: Consumo API Envíame para la creación de un envío
Desarrolla una función o script que consuma la API Envíame para la creación de un Envío y almacene la respuesta en algún medio de almacenamiento permanente
* 'GET - http://localhost:8089/scripts/ejercicio4.php' El script corre sin input, el output es la impresion del resultado de la consulta al API enviame, la impresion de los datos tomados del resultado para guardar en base de datos, el indicativo del guardado y la impresion de las ultimas 5 consultas guardadas en la base de datos.

# Ejercicio 5: Análisis + Desarrollo
Crea un script en tu lenguaje favorito que obtenga el primer número de Fibonacci que tiene más de 1000 divisores.

El script esta hecho en python, para correrlo se preparo un contenedor el cual se puede acceder en el directorio 
`/enviame-test/src/ejercicio5py` 
Corriendo el comando: 
`docker build -t script_python .`
Luego de que este montada la imagen correr el comandato:
`docker run script_python`
* Reflexion: debido a la complejidad de los calculos para numeros muy grandes se tomo en cuenta varios metodos como la criba de eratostenes(erathostenes sieve) y otros metodos, el que menos tiempo se demoro en mi equipo es el usado en el script el cual en la iteracion 92 encuentra el numero de la serie de fibonacci con la cantidad de divisores mayor a 1000, incluso es mayor a 2000

* Notas: Si vale de algo como analisis y reflexion del problemma, logre un menor tiempo de ejecucion en C# usando este y otros metodos, para muestra va incluido en el en el directorio /enviame-test/src/ejercicio5py/ejercicio5Csharp la carpeta con el script, para correrlo no se preparo una imagen, pero si se tiene visual studio se puede correr abriendo el proyecto desde el programa.

# Ejercicio 6: Análisis + Desarrollo Aplicado a Negocio
Desarrolla una función o procedimiento que estime el tiempo de entrega de la entrega de una compra online (en días)
* 'GET - http://localhost:8089/scripts/ejercicio6.php' El script corre sin input, el output es la impresion de el rango de km de forma aleatorea y los dias que tomaria basandose en la instruccion del ejercicio.

# Ejercicio 7: SQL
Actualizar los sueldos de los empleados que ganen $5000 o menos, de acuerdo al reajuste anual del continente al que pertenecen.
En el directorio siguiente esta el archivo 'sql-ejercicio7.sql' donde se encuentra el query que cumple con el requerimiento

`enviame-test/src/mysql_files/sql-ejercicio7.sql`

El Query en cuestion es

`UPDATE 'employees' em INNER JOIN 'countries' ct ON em.country_id = ct.id INNER JOIN 'continents' cn ON cn.id = ct.continent_id SET em.salary = em.salary +(em.salary *(cn.anual_adjustment / 100)) WHERE em.salary <= 5000`

# Complemento de bases de datos
En el directorio siguiente se encuentran los archivos 

* 'tabla-ejercicio2.sql'
* 'tabla-ejercicio4.sql'
* 'tabla-ejercicio7.sql' 

cada uno respectivamente tiene los querys para crear las tablas usadas para todo el test.

