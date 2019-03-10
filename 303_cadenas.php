<?php 
//Utilizando las funciones substr y strrpos imprimir en pantalla el nombre de un archivo sin su extensión con independencia e cual sea ésta Ej: nombrearchivo.jpg
$cadena = 'nombrearchivo.jpg';

$pos = strrpos($cadena, '.');

echo $pos;
echo '<br>';

echo substr($cadena, $pos+1);//se non voglio il punto di una estensione generica

?>