<?php
    //variables en php;
    echo 7==="7"; //ci ritorna un false en pantalla no aparece nada;
    echo 7===7; //ci ritorna true, en pantalla aparece 1;

    //sintaxis abreviada
    echo "<br>";
    $a = 4;
    $b = 5;
        //$a = $a + $b equivalente a:
    $a += $b;
    echo $a;

    //operadores unarios (per sommare, sottrarre 1)
    echo "<br>";
            //$a = $a + 1; equivalente a:
    $a ++;
    echo $a;

    $b=$a++; //a vale 5 dopo l esecuzione, ma b, vale a prima di eseguire il ++, quindi 4
    $b=++$a; //adesso b = 5, prima fa la somma 4+1 e poi fa la assegnazione b = a

?>