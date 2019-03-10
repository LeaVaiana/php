<?php

$dias = ["domingo", "lunes", "martes", "miercoles", "jueves", "viernes", "sábado"];

foreach ($dias as $dia) {//no es necesario definir fuera del foreach la variable dia
    echo "Hoy es $dia <br>"; //posso utilizzare echo perche giá non è un array ma il valor di ciascun elemento dell'array
} 

//para saber cuanto elementos tiene un array
echo count($dias);//7

?>