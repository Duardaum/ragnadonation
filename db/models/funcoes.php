<?php

/**
 * @param $string String que deseja remover os caracteres especiais e transformar em maiusculo
 * @return string
 */
function RemoveCaracEsp($string){

$array1 = array("á", "à", "â", "ã", "ä", "é", "è", "ê", "ë", "í", "ì", "î", "ï", "ó", "ò", "ô", "õ", "ö", "ú", "ù", "û", "ü", "ç", "Á", "À", "Â", "Ã", "Ä", "É", "È", "Ê", "Ë", "Í", "Ì", "Î", "Ï", "Ó", "Ò", "Ô", "Õ", "Ö", "Ú", "Ù", "Û", "Ü", "Ç" );
$array2 = array("a", "a", "a", "a", "a", "e", "e", "e", "e", "i", "i", "i", "i", "o", "o", "o", "o", "o", "u", "u", "u", "u", "c", "A", "A", "A", "A", "A", "E", "E", "E", "E", "I", "I", "I", "I", "O", "O", "O", "O", "O", "U", "U", "U", "U", "C" );

$str = str_replace($array1, $array2, $string); 

return strtoupper($str);
}

/**
 * @param $data Data que deseja inverter para enviar para o banco ou inverter para a interface grafica
 * @return data_string
 */
function InverteDataBanco($data){

	$newdata = str_replace("/", "-", $data);
	$simbolo = substr($newdata, 2, 1);
	
	if($simbolo == "-"){
		$dia = substr($newdata, 0, 2);
		$mes = substr($newdata, 3, 2);
		$ano = substr($newdata, 6, 4);
		
		$newdata = $ano."-".$mes."-".$dia; //Formato Americano.
		
		return $newdata;
	}else{
		$ano = substr($newdata, 0, 4);
		$mes = substr($newdata, 5, 2);
		$dia = substr($newdata, 8, 2);
		
		$newdata = $dia."/".$mes."/".$ano; //Formato Brasileiro.
		
		return $newdata;
	}
}


/**
 * @param $n_carac Número de caracteres que deseja que contenha no código Alpha numérico
 * @return string
 */
function GerarCodigo($n_carac){

    $COD01 = array("A","B","C","D","E","F","G","H","I","J","K","L","M","N","O","P","Q","R","S","T","U","V","W","X","Y","Z",'a','b','c','d','e','f','g','h','i','j','k','l','m','n','o','p','q','r','s','t','u','v','w','x','y','z','0', '1', '2', '3', '4', '5', '6', '7', '8', '9');

    $VALOR = array_rand($COD01, $n_carac);

    $i = (int) '0';
    while($i <= ($n_carac - 1)){
        $CODIGO .= $COD01[$VALOR[$i]];
    $i++;
    }

    return trim($CODIGO);
}
?>