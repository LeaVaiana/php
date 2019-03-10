<?php
//abrir el fichero (creo una variabile e fopen(nome fichero, come vogliamo che si apra));
$fichero = fopen ('232_fichero.txt', 'w');//modo r solo lectura quindi non funziona fwrite, devo usare r+, w abro en modo scrittura, sostituisco il contenuto del fichero con adios mundo, 

//echo $fichero; //Resource id #3



//leer letra a letra con un while:
    /*
    while (!feof($fichero)){
        $letra = fgets($fichero). '/'; //.'/' per separare lettera a lettera (prova fgets)
        echo $letra;
    }*/

/*$contenido = fread($fichero, 10); //ci legge i primi 10 caratteri;
echo $contenido;*/

//per leggere tutto il contenuto
$contenido = fread($fichero, 10); //filesize('232_fichero.txt' equivalente al file get content senza bisogno di aprire il file;
echo $contenido;

echo '<br>';

fwrite($fichero, 'adios mundo');//aggiungo questo contenuto con r+

readfile('232_fichero.txt');//contiene l'echo;

//per chiudere il fichero, para no gastar recursos, lo cierra internamente
fclose($fichero)



?>