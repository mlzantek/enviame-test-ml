<?php
Desarrolla una función o procedimiento que estime el tiempo de entrega de la entrega de una compra online (en días), en función de la distancia que existe entre una dirección de origen y destino.

Suponga que los envíos siempre se despachan desde el mismo origen.

Para la determinación de la distancia entre el origen y destino genere números aleatorios entre 0 km y 2.000 km Asuma que el tiempo de despacho está determinado por una sucesión numérica, donde cada N término se relaciona con un incremento en un rango de distancia entre la dirección de origen y de destino como se muesta a continuación.

Rango 1. Menos de 100 km, se entregan el mismo día (Día cero)
Rango 2. Menos de 200 km, se entregan al día siguiente (Día uno)
Rango 3. Menos de 300 km, se entregan al día siguiente (Día uno)
Rango 4. Menos de 400 km, se entregan al día subsiguiente (Día dos)
Rango 5. Menos de 500 km, se entregan al tercer día (Día tres) ...
Rango n. Menos de n km, Los días de entrega se calculan como la suma de los días de entrega de los rangos n–1 y n-2
$origen = 0;
$destino = rand(0,2000);
echo nl2br("Origen: ".$origen."\n");
echo nl2br("Destino: ".$destino."\n");

function calculaEntrega($destino) {

	while ($num < 10 ) {  
    $n3 = $n2 + $n1;  
    echo $n3.' ';  
    $n1 = $n2;  
    $n2 = $n3;  
    $num = $num + 1; 
  }
}

$length = strlen($texto);
echo '<pre>' , var_dump($texto) , '</pre>';

echo nl2br("\nLa(s) cadena(s) de texto que es(son) igual al revés(palindromos) en el texto anterior son:\n");

for ($i = 0; $i < $length - 1; $i++) {
	for ($j = $length - $i; $j > 1; $j--) {
		if (esPalindromo(substr($texto, $i, $j))) {
			$palabra = substr($texto, $i, $j);
			echo nl2br("\n".$palabra);
			break;
		}
	}
}

?>