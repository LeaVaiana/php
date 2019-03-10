<?php
/*
//en una cookie no podemos guardar un array, entonces para un array asociativo lo tenemos que pasar a texto, ej como formato json.
$paises=array('Francia' => 'Paris', 'Ecuador' => 'Quito', 'Gran Bretaña' => 'Londres', 'Alemania' => 'Berlin', 'Argentina' => 'Buenos Aires');

//convertir el array a json:
$listaPaises = json_encode($paises);
//echo $listaPaises;

//una vez convertido en texto lo podemos guardar en una cookie:
setcookie('paises',$listaPaises, time() + 3600);*/

//recuperar el contenido de una cookie:
$listaPaises = $_COOKIE['paises'];

//adesso converto di nuovo il texto in array;
$paises = json_decode($listaPaises, true);//necesita de un segundo parametro true para obtener un array asociativo
print_r($paises);



?>