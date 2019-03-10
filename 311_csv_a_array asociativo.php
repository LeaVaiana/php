<?php
//1 abrir el fichero csv (modo r):
$csv = fopen('csv/309_alumnos.csv','r');

//2 primera lectura del fichero: los nombres de las columnas.
$columnas = fgets($csv);

//3 convertir la fila en un array:
$arrayColumnas = explode(';',$columnas);
//print_r($arrayColumnas);

//4 crear el array de alumnos vacio:
$arrayAlumnos = array();

//5 bucle para leer el resto del fichero fila a fila
while(!feof($csv)){//se mi ritorna true significa che siamo arrivati alla fine del file
    //volver a leer el fichero:
    $fila = fgets($csv);

    //convertir la fila en un array:
    $arrayFila = explode (';', $fila);
    //print_r($arrayFila);
    //echo '<br>';
    

    //recorrer el array de columnas para montar las claves asociativas de cada fila
    foreach ($arrayColumnas as $clave => $nombreColumna){//il valor che otteniamo da questo array è il nome delle colonne
        //el primer elemento del array de filas será la clave asociativa de cada fila del array de alumnos.
        //preguntar si la clave que esta mos tratando es la zero, o sea el primer elemento, me lo guardo en la variable clave alumno.
        if($clave==0){
            $claveAlumno = $arrayFila[0];
            continue;
        }
        //informar el array de alumnos con la fila del fichero
        $arrayAlumnos[$claveAlumno][$nombreColumna]=$arrayFila[$clave];
        

    }
}
print_r($arrayAlumnos);


?>
