<?php
    //creamo due variabili per conservare i dati che ci arrivano dal formulario
    $nombre = $_GET["nombre"];//$_GET: supervariable php, è un array;
    $edad = $_GET["edad"];

    echo "$nombre $edad";

    echo "<br>";

    echo "<textarea>El nombre es $nombre . La edad es $edad.</textarea>";


    

    //se nell'html usiamo la peticion post lo raccogliamo con $post (con il post non possiamo leggere i parametri nella barra superiore)
    //$_request, da igual como inviamos  se con get o con post;
    //de norma utilizar post, pero podemos utilizar get para permitir al usuario cambiar el idioma mediante la barra de navegacion;
?>
<!--in questo caso la risposta la otteniamo in questo secondo html e non nel primo;-->
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Document</title>
</head>
<body>

<textarea>
<?php echo "El nombre es $nombre . La edad es $edad.";?>
</textarea>
    
</body>
</html>