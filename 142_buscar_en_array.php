<?php
$dias = ["domingo", "lunes", "martes", "miercoles", "jueves", "viernes", "sábado"];

$clave = array_search('miercoles',$dias);
echo $clave;
echo '<br>';

//se l'elemento non esiste ci ritorna null e non -1 come js
$clave = array_search('mercoledi',$dias);
echo $clave;//non vedo niente, nemmeno -1 como in js

//borrar elemento buscado, prima chiediamo se esiste con if

if($clave!=null){
    array_splice($dias, $clave, 1);
}
print_r($dias);

//mi cancella l elemento con indice 0 solo se nell'if metto il doppio ugual
$clave = array_search('domingo',$dias);
echo $clave;
echo '<br>';

if($clave!==null){
    array_splice($dias, $clave, 1);
}
print_r($dias);

?>
