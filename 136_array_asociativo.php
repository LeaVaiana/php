<?php
$paisCapital = array('Francia' => 'Paris', 'Ecuador' => 'Quito', 'Gran Bretaña' => 'Londres', 'Alemania' => 'Berlin', 'Argentina' => 'Buenos Aires');

//per vedere solo il valore
foreach ($paisCapital as $valor) {//no es necesario definir fuera del foreach la variable dia
    echo "$valor <br>"; //ottengo solo i valori
} 
//per vedere clave e valore
foreach ($paisCapital as $clave=>$valor) {//no es necesario definir fuera del foreach la variable dia
    echo "Capital de $clave es $valor <br>"; //ottengo solo i valori
} 
//per vedere tutto l'array
print_r($paisCapital);
echo '<br>';


//borrar elemento en array asociativo, prima bisogna cercare l'elemento

$clave = array_search('Paris',$paisCapital);
echo "la clave es $clave"; //Francia, non ho indici
echo '<br>';

//borrar el elemento Francia
if($clave!==null){//chiedo se esiste paris
    unset($paisCapital[$clave]);//in array asociativos non posso usare splice
}
print_r($paisCapital);
?>
