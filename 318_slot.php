<?php
//definir variables capital inicial y apuesta:
$capitalInicial = 1000;
$apuesta = 100;
echo "<br>";
echo "apuesta: $apuesta";
echo "<br>";

//inicializar contador de jugadas:
$contador = 1;



//bucle para generar jugadas mientras el capital sea mayor o igual que la apuesta
while ($capitalInicial>=$apuesta){
    //mostrar numero de jugada:
    echo "<br>";
    echo "Jugada Numero: $contador";
    echo "<br>";

    //mostrar capital antes de la jugada:
    echo "CAPITAL INICIAL: $capitalInicial";
    echo "<br>";

    //generar 3 numeros aleatorios:n
    $num1= rand(0, 9);
    $num2= rand(0, 9);
    $num3= rand(0, 9);
    //echo "$num1 $num2 $num3";
    
    // mostrar las imagenes que correspondan con los numeros aleatorios;
    echo "<img src='img/$num1.png'>";
    echo "<img src='img/$num2.png'>";
    echo "<img src='img/$num3.png'>";
    echo "<br>";
    

    //comprobar si se ha obtenido premio
   
    if ($num1==8 && $num2==8 && $num3==8){
        //tres sietes
        $premio= 100*$apuesta;
    }else if($num1 == $num2 && $num2==$num3){
        //tres figuras iguales, no hay 7 por la primera condicion más restrictiva
        $premio= 6*$apuesta;
    }else if($num1==8 && $num2==8 || $num1==8 && $num3 ==8 || $num2==8 && $num3 ==8) {
        //dos sietes iguales
        $premio= 4*$apuesta;
    }else if($num1 == $num2 || $num1 == $num3 || $num2 == $num3){
        //dos figuras iguales
        $premio= 2*$apuesta;
    }else{
        $premio=0;
    }
    
    

    //recalcular capital (capital antes de jugar menos la apuesta mas la ganancia);
    $capitalInicial = $capitalInicial - $apuesta + $premio;

    //mostrar premio obtenido
    echo "<br>";
    echo "premio: $premio";


    //mostrar capital despues de jugar,
    echo "<br>";
    echo "Capital: $capitalInicial";

    echo "<hr>";

    //sumar 1 al contador de jugadas
    $contador++;

    

}


?>