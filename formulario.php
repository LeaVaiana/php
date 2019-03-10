
<?php
//INIZIALIZIAMO LE VARIBILI che si usano nel documento web: per evitare che appaia l'errore di una variabile non definita (la prima volta che entri in un formulario le variabili nome e edad non sono definite):
    $nombre="";
    $edad="";

//tenemos que preguntar si se ha pulsado al boton enviar del formulario
if(isset($_GET["enviar"])){//isset serve per chiedere se qualcosa esiste, usiamo il metodo usato (get o post) e il name del submit
    $nombre = $_GET["nombre"];
    $edad = $_GET["edad"];
}

?>



<!DOCTYPE html>
<html lang="en">
<head>
    
    <title>Document</title>
    <!--adesso il formulario avrá estensione php, perche verrá processato al servidor e la risposta la otteniamo nella stessa pagina che tornerá a caricarsi-->
</head>
<body>
    <form method="get" action="#">
        <input type="text" name="nombre" required>
        <input type="number" name="edad">
        <input type="submit" name="enviar">
    <!--aggiungo il campo per la risposta che ci torna php-->
    </form><br><br>
    <textarea>
        <?php 
            echo "$nombre $edad";
        ?>



    </textarea>
    
</body>
</html>