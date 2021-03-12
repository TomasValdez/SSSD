 <?php

function obtenCaracterAleatorio($arreglo) {
		$clave_aleatoria = array_rand($arreglo, 1);	//obtén clave aleatoria
		return $arreglo[ $clave_aleatoria ];	//devolver ítem aleatorio
	}
 
	function obtenCaracterMd5($car) {
		$md5Car = md5($car.Time());	//Codificar el carácter y el tiempo POSIX (timestamp) en md5
		$arrCar = str_split(strtoupper($md5Car));	//Convertir a array el md5
		$carToken = obtenCaracterAleatorio($arrCar);	//obtén un ítem aleatoriamente
		return $carToken;
	}
 
	function obtenToken() {
		//crear alfabeto
        $minic = "abcdefghijkmnopqrstuvwxyz";

		$mayus = "ABCDEFGHIJKMNPQRSTUVWXYZ";
		$mayusculas = str_split($mayus);	//Convertir a array
        $minuscula = str_split($minic);
		//crear array de numeros 0-9
		$numeros = range(0,9);
		//revolver arrays
		shuffle($mayusculas);
		shuffle($numeros);
        shuffle($minuscula);
        //Unir arrays
		$arregloTotal = array_merge($mayusculas,$numeros,$minuscula);
		$newToken = "";
		
		for($i=0;$i<25;$i++) {
				$miCar = obtenCaracterAleatorio($arregloTotal);
				$newToken .= obtenCaracterMd5($miCar);
		}
        
    return $newToken;
    }



