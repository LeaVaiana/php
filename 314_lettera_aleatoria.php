<?php
//Utilizando las funciones strlen(), substr() y rand(), obtener una letra aleatoria de tu nombre.
    
//asignar un texto a una variable
    $texto = 'Soy un texto';

    //Determinare la longitud del texto
    $len= strlen($texto);
    echo $len; //12

    //generar numero aleatorio entre 0 y longitud
    $num= rand(0, $len-1);
    echo "<br>";
    echo $num;

    //imprimir la letra que ocupa la posición del numero aleatorio
    echo "<br>";
    echo substr($texto, $num, 1);
 
?>