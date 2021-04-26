<?php

function calculaEntrega() {
	$destino = rand(0,2000);
	// La formula para calcular los dias de envio es la formula de la serie de fibonacci por lo tanto nos valimos de ella para calcular los dias basandonos en el rango como cada numero en la serie.
	// tomando el rango como la distancia en slots de 100 km
	$rango_n = ceil (($destino)/100);
	$dias =  $rango_n == 1 ? 0 : round(pow((sqrt(5)+1)/2, $rango_n-1) / sqrt(5));
	$mensaje = "Se entrega el mismo día";
	$mensaje = $rango_n == 2 ? "Se entrega al día siguiente" : $mensaje;
	$mensaje = $rango_n == 3 ? "Se entrega al día siguiente" : $mensaje;
	$mensaje = $rango_n == 4 ? "Se entrega al día subsiguiente" : $mensaje;
	$mensaje = $rango_n > 4 ? "se entrega en ".$dias." día(s)" : $mensaje;
	echo "<pre>",print_r(
		array(
			"Distancia" => $destino." Km",
			"mensaje" => $mensaje,
			"dias" => $dias,
			"rango" => $rango_n,
		)
	),"<pre>";
}

calculaEntrega();

?>