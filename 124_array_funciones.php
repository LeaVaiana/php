<?php

$array = array('rojo','azul','verde');

print_r($array);
echo"<br>";

//i piú importanti: push, pop, unset, splice, explode, implode

//aggiungere elementi alla fine dell'array (nome dell array, piú gli elementi che voglio aggiungere)
array_push($array, 'amarillo','blanco');
print_r($array);
echo"<br>";

//aggiungere elementi all'inizio dell'array;
array_unshift($array, 'rosa','giallo');
print_r($array);
echo"<br>";

//borrar el ultimo elemento dell'array con pop e se lo voglio conservare in una variabile  glielo assegno
$elemento=array_pop($array);
print_r($array);
echo"<br>";
echo $elemento;//e mi ritorna l'elemento eliminato dall'array

//se vogliamo eliminare un elemento di un determinato indice:
unset($array[2]);//mi cancella il terzo elemento ma non riorganizza gli indice (ottengo un buco negli indici)
print_r($array);
echo"<br>";

$array[2]='violeta';//mi aggiunge l'elemento di indice 2, ma continua ad essere non ordinato
print_r($array);
echo"<br>";

//per eliminare e ordinare vari elementi dalla posizione 1 mi elimina 3 elementi
$elemento=array_splice($array, 1, 2);
print_r($array);
echo"<br>";
//array_splice($array, 0,0); dato che splice borra e ordina posso usare questa forma per ordinare gli indici senza borrare nessun elemento
print_r($elemento) ; //a differenza dell unset ottengo un array e quindi non posso usar un echo ma un print_r
echo"<br>";
echo '-------------<br>';

//CONVERTIR TEXTO EN ARRAY
$lista = "negro, rojo, azul, verde, amarillo, blanco";
echo $lista;
echo '<br>';
$array = explode(", ",$lista);
print_r ($array);
echo '<br>';

//CONVERTIR ARRAY (el anterior) A TEXTO separados por una /

$lista = implode("/",$array);
echo $lista;
echo '<br>';
?>
