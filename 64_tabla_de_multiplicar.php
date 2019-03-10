<?php

//TABLA DE MULTIPLICAR

//bucle for 1 a 10 para el numerador

for ($n=1; $n<=10; $n++){
    //bucle for 1 a 10 para el denominador
    for ($d=1; $d<=10; $d++){
        //imprimir por pantalla la operacion
        echo "$n x $d = ".($n*$d)."<br>";
    }
    //imprimir por pantalla la linea separadora
    echo "---------------<br>";
}

?>
