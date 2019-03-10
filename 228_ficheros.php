<?php
//ESEMPI DI USO ACCESSO A FICHEROS

    //leer un fichero externo
    /*$contenido = file_get_contents('228_texto.txt');
    echo $contenido;

    $contenido2 = readfile('228_texto.txt');//l'echo e mi ritorna anche il numero di caratteri
    echo $contenido2;*/

/*
    $contenido = "Este contenido tiene un \n salto de linea";//solo ""
    //escribir un fichero
    file_put_contents('228_texto.txt', $contenido);
    //leer el fichero;
    readfile('228_texto.txt');
    //l'errore access denied, andare su ogni archivo php e txt, get info, cambiare i permessi a read and write. O altrimenti provare a tutta la carpetta ejercicio*/


//ESERCIZIO
    //inicializo variables utilizadas en el html
    $contenido='';

    //detectar si se ha pulsado enviar
    if(isset($_POST['enviar'])){
        //recuperar el contenido del textarea:
        $contenido = $_POST['texto'];

        //guardarlo en un fichero:
        file_put_contents('230_contenido.txt', $contenido);//si el fichero no existe se crea il file 230, altrimenti ci scrive di sopra
    }

    //al cargar la pagina mostrar el contenido del fichero en el textarea.
    if (file_exists('230_contenido.txt')){
        $contenido = file_get_contents('230_contenido.txt');
    };

        

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form method='post' action='#'>
        <textarea name='texto'><?php echo $contenido;?></textarea>
        <input type="submit" name="enviar">
    </form>
    
</body>
</html> 
