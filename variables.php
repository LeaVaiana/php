<?php
    //variables en php, iniziano con $ e non e necessario definirne il tipo
    $texto= "soy un texto";
    $numero = 34;
    $numero1 = 3;
    $numero2 = 4;

    $bool = true;// o false

    echo $bool; //se $bool es true appare 1 se è false non appare niente


    //sumar en php, el signo mas solo sirve para sumar, quindi se anche un numero está entre comillas lo somma, perche guarda al contenuto della variabile
    echo"<br>";
    echo $numero1 + $numero2;
    echo"<br>";
    echo $numero1.$numero2;//qui ho concatenato, se concateno tra variabili non sono necessarie le virgolette

    //concatenar en php con . (posso usare '' o "")
    echo"<br>";
    echo "texto: ".$texto;
    //otra forma de concatenar
    echo"<br>";
    echo "tecto: $texto";//solo con ""


    //definire costante in maiuscola e senza dollaro
            //1 opzione
    echo"<br>";
    const PI = 3.1415;
    echo PI;
            // 2 opzione (tra parentesi nome e valore)
    echo"<br>";
    define("E", 2.71828);
    echo E;

    //operadores


    //operadores logicos (per le comparazioni) <, >, <=, >=, ==, ===,
    

?>