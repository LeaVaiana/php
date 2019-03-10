<?php
    $cadena = 'HOLA MUNDO';

    //estraer un trozo de la cadena
    echo substr($cadena, 0, 3);//dalla posizione 0, estraiamo 3 caratteri: HOL;
    echo '<br>';
    //longitud de una cadena:
    echo strlen($cadena);//10
    echo '<br>';
    //estraer desde el caracter especificado hasta final, incluyendo el caracter
    echo strstr($cadena, 'A');//A MUNDO
    echo '<br>';
    //substituir parte de una cadena:
    echo str_replace('HOLA', 'ADIOS',$cadena);//ADIOS MUNDO
    echo '<br>';
    //pasar el texto a minusculas
    echo strtolower($cadena);
    echo '<br>';
    //posicion del primer elemento que coincida con el caracter especificado
    echo strpos($cadena, 'O');//1
    echo '<br>';


?>