<?php
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
            //print_r($alumno);
            //echo '<br>';

            //insertar cada fila all'array alumnos vacio inicial
            array_push($alumnos, $alumno);//dove voglio aggiungere $alumnos e elemento che voglio aggiungere $alumno
        }     
    }
        
        //cerrar el fichero (es una buena practica)
        fclose($fichero);
        //mostrar el array de alumnos
        //print_r($alumnos);

        //PER STAMPARE IN HTML LA TABLA

        //leer fila a fila el array de alumnos
            $filas = '';
            foreach ($alumnos as $alumno) {
                //cada fila del array es una etiqueta <tr> de la tabla:
                $filas.="<tr>";
                foreach ($alumno as $dato){//$dato es cada una de las columnas
                //cada elemento del subarray è una etichetta td;
                $filas.="<td>$dato</td>";
            }
            $filas.="</tr>";
         } 

            




?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <style>
    table, td {border: 1px solid green}
    </style>
</head>
<body>
    <table>
       <?php echo $filas ?>;
    </table>
    
</body>
</html>