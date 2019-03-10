<?php
//crear el array vacio:
    $arrayNumeros=array();

//bucle para llenar el array con valore aleatorios;

for ($i=0; $i<10; $i++) {
    $rand=rand(1, 100);
    array_push($arrayNumeros, $rand);
} 
  

//imprimir el array;

print_r($arrayNumeros);
   

//ordenar el array;
sort($arrayNumeros);
echo "<br>";
//imprimir el array;
print_r($arrayNumeros);

//convertir el array a una lista (elementos separados por comas);
$lista = implode(',',$arrayNumeros);

//imprimir la lista;
echo "<br>";
echo $lista;
?>
