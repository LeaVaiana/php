<?php
//se metto l'echo dentro la variabile: variabile non definita
//per vedere la variabile devo fare l'eco fuori la variabile
$a=4; //variabile globale definita fuori la funzione

verVariable();

function verVariable(){
    $b=3; //variabile locale, faccio l echo dentro la funzione e me lo ritorna
    //global $a se la scrivo cosí la vedo anche fuori!
    echo $b;
    echo $a;//variabile non definita
}
echo $a;

//stampo 3; variabile non definita; 4

//il return mi ritorna il valore della variabile fuori dalla funzione ma devo raccoglierlo in una variabile quando chiamo la funzione:
//es: $b=verVariable()




?>