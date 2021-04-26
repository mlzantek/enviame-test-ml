<?php

$texto = 'afoolishconsistencyisthehobgoblinoflittlemindsadoredbylittlestatesmenandphilosophersanddivineswithconsistencyagreatsoulhassimplynothingtodohemayaswellconcernhimselfwithhisshadowonthewallspeakwhatyouthinknowinhardwordsandtomorrowspeakwhattomorrowthinksinhardwordsagainthoughitcontradicteverythingyousaidtodayahsoyoushallbesuretobemisunderstoodisitsobadthentobemisunderstoodpythagoraswasmisunderstoodandsocratesandjesusandlutherandcopernicusandgalileoandnewtonandeverypureandwisespiritthatevertookfleshtobegreatistobemisunderstood';

function esPalindromo($texto) {
  return $texto == strrev($texto);
}

$length = strlen($texto);

$cadenas = "";
for ($i = 0; $i < $length - 1; $i++) {
	for ($j = $length - $i; $j > 1; $j--) {
		if (esPalindromo(substr($texto, $i, $j))) {
			$palabra = substr($texto, $i, $j);
			$cadenas.= ($palabra.",");
			break;
		}
	}
}

$cadenas = substr($cadenas, 0, -1);
$cadenas = implode(',',array_unique(explode(',', $cadenas)));
echo print_r(
	array("Texto" => $texto,
				"Mensaje" => "La(s) cadena(s) de texto que es(son) igual al revés(palindromos) en el texto anterior son:",
				"Cadenas" => $cadenas)
);

?>