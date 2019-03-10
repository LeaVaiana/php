<?php
//1CONVERTIR CSV EN ARRAY
    //crear array vacio para guardar las filas 
    $alumnos = array();


    //abrir el fichero csv:
    $fichero = fopen('csv/309_alumnos.csv', 'r');

    //recorrer el fichero mientras haya filas;
    while(!feof($fichero)){//se mi ritorna true significa che siamo arrivati alla fine del file
        //leer el fichero fila a fila:
        $fila = fgets($fichero);
        //echo "$fila<br>";

        //convertir cada fila en un array;
        if($fila !=null){
            $alumno = explode(';',$fila);
            print_r($alumno);
            echo '<br>';

            //insertar cada fila all'array alumnos vacio inicial
            array_push($alumnos, $alumno);//dove voglio aggiungere $alumnos e elemento che voglio aggiungere $alumno
        }     
    }
        
        //cerrar el fichero (es una buena practica)
        fclose($fichero);
        //mostrar el array de alumnos
        //print_r($alumnos);

//2 CONVERTIR ARRAY EN CSV:

    //abrir otro fichero CSV:
    $fichero = fopen('csv/312_alumnos.csv','w');

    //recorrer el array de alumnos:
    foreach ($alumnos as $alumno){//cada fila es un alumno, otro array
            
            //convertir cada fila en un texto separado por ';', implode convierte texto en array;
            $fila = implode(';', $alumno);

            //grabar el fichero csv;
            fwrite($fichero, $fila);//queremos guardar cada fila en el fichero

    }

        



?>

